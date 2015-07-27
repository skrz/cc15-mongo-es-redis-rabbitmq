<?php
namespace CC15\MQ\Consumer;

use Bunny\Channel;
use Bunny\Message;
use CC15\Entity\Category;
use CC15\Entity\Image;
use CC15\Entity\Meta\CategoryMeta;
use CC15\Entity\Meta\ProductMeta;
use CC15\Entity\Product;
use CC15\Entity\ProductExtraMessageEnum;
use CC15\Entity\ProductItemTypeEnum;
use CC15\MQ\Producer\ChangeProducer;
use CC15\MQ\RoutingKeys;
use CC15\MQ\VO\Change;
use CC15\MQ\VO\Import;
use CC15\Repository\CategoryRepository;
use CC15\Repository\ProductRepository;
use Psr\Log\LoggerInterface;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\BunnyBundle\Annotation\Consumer;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Consumer(
 *     queue="feed_import",
 *     meta="CC15\MQ\VO\Meta\ImportMeta",
 *     prefetchCount=1
 * )
 */
class ImportConsumer
{

	/**
	 * @var LoggerInterface
	 *
	 * @Autowired
	 */
	public $log;

	/**
	 * @var ProductRepository
	 *
	 * @Autowired
	 */
	public $productRepository;

	/**
	 * @var CategoryRepository
	 *
	 * @Autowired
	 */
	public $categoryRepository;

	/**
	 * @var ChangeProducer
	 *
	 * @Autowired
	 */
	public $changeProducer;

	public function handleMessage(Import $import, Message $message, Channel $channel)
	{
		if (!$import->getTmpFileName()) {
			$this->log->error("Import w/o tmp file name: {$message->content}.");
			$channel->ack($message);
			return;
		}

		if (!file_exists($import->getTmpFileName())) {
			$this->log->error("Tmp file name '{$import->getTmpFileName()}' does not exist.");
			$channel->ack($message);
			return;
		}

		$this->log->info("Got " . $message->content);

		// TODO: error handling
		$handle = fopen($import->getTmpFileName(), "r+");

		while (fread($handle, 3) === "\xef\xbb\xbf") {
			fseek($handle, -3, SEEK_CUR);
			fwrite($handle, "   ");
			$this->log->info("Removed BOM in file '{$import->getTmpFileName()}'.");
		}

		fseek($handle, 0, SEEK_SET);
		$data = fread($handle, 1024);

		if (($sp = strpos($data, "<?xml")) !== false) {
			if (($ep = strpos($data, "?>")) !== false) {
				$newData = substr($data, $sp, $ep - $sp + 2) . str_repeat(" ", $sp) . substr($data, $ep + 2);
				fseek($handle, 0, SEEK_SET);
				fwrite($handle, $newData);
			}
		}

		fclose($handle);

		$eshopId = $import->getEshop()->getId();

		$reader = new \XMLReader();
		$reader->open($import->getTmpFileName());

		while ($reader->read()) {
			if (strtoupper($reader->name) !== "SHOPITEM") {
				continue;
			}

			$item = @$reader->expand();

			if ($item === false) {
				$this->log->error("XMLReader error: " . json_encode(libxml_get_last_error()));
				break;
			}

			$reader->next();

			$product = new Product();
			$product->setEshopId($eshopId);

			foreach ($item->childNodes as $child) {
				/** @var \DOMNode $child */

				if ($child->nodeType !== XML_ELEMENT_NODE) {
					continue;
				}

				$textContent = trim($child->textContent);
				if (empty($textContent)) {
					$textContent = null;
				}

				switch ($name = strtoupper($child->nodeName)) {
					case "ITEM_GROUP_ID":
						$product->setItemGroupId($textContent);
						break;
					case "ITEM_ID":
						$product->setItemId($textContent);
						break;
					case "PRODUCTNAME":
						$product->setName($textContent);
						break;
					case "PRODUCT":
						$product->setLongName($textContent);
						break;
					case "DESCRIPTION":
						$product->setDescription($textContent);
						break;
					case "URL":
						// TODO: normalize URL
						$product->setUrl($textContent);
						break;
					case "PRICE_VAT":
						$product->setPrice(floatval(preg_replace("/[^0-9.]+/", "", str_replace(",", ".", $textContent))));
						break;
					case "DELIVERY_DATE":
						$product->setDeliveryDate(intval(preg_replace("/[^0-9]+/", "", $textContent)));
						break;
					case "IMGURL":
					case "IMGURL_ALTERNATIVE":
						// TODO: normalize URL
						$image = new Image();
						$image->setUrl($textContent);
						$product->addImage($image);
						break;
					case "EAN":
						$product->setEan($textContent);
						break;
					case "ISBN":
						$product->setIsbn($textContent);
						break;
					case "PRODUCTNO":
						$product->setProductno($textContent);
						break;
					case "MANUFACTURER":
						$product->setManufacturer($textContent);
						break;
					case "BRAND":
						$product->setBrand($textContent);
						break;
					case "CATEGORYTEXT":
						if (!empty($textContent)) {
							$product->addCategoryText($textContent);
						}
						break;
					case "ITEM_TYPE":
						try {
							$product->setItemType(ProductItemTypeEnum::fromXML($textContent));
						} catch (\InvalidArgumentException $e) {
							$this->log->warning("Got exception while assigning ITEM_TYPE: " . $e->getMessage());
						}
						break;
					case "EXTRA_MESSAGE":
						try {
							$product->addExtraMessage(ProductExtraMessageEnum::fromXML($textContent));
						} catch (\InvalidArgumentException $e) {
							$this->log->warning("Got exception while assigning EXTRA_MESSAGE: " . $e->getMessage());
						}
						break;
				}
			}

			if ($product->getUrl() === null) {
				$this->log->warning("Skipping product without URL: " . ProductMeta::toJson($product));
				continue;
			}

			if ($product->getName() === null) {
				if ($product->getLongName() === null) {
					$this->log->warning("Skipping product without PRODUCT/PRODUCTNAME: " . ProductMeta::toJson($product));
					continue;
				} else {
					$product->setName($product->getLongName());
				}
			}

			if ($product->getItemId() === null) {
				$product->setItemId($product->getUrl());
			}

			if ($product->getItemGroupId() === null) {
				$product->setItemGroupId($product->getItemId());
			}

			for (; ;) {
				$existing = $this->productRepository->findOneFromEshop($product);

				if (!$existing) {
					$this->fillCategoryIds($product);

					$ret = $this->productRepository->insert($product);

					if (isset($ret["ok"]) && $ret["ok"]) {
						$this->changeProducer->publish(
							Change::create()->setProduct($product),
							RoutingKeys::CHANGE_PRODUCT_CREATE
						);

						break;
					}

				} else {
					$this->mergeProducts($product, $existing);
					$this->fillCategoryIds($product);

					$ret = $this->productRepository->update(
						["_id" => $existing->getId(), "v" => $existing->getV()],
						ProductMeta::toArray($product)
					);

					if (isset($ret["ok"]) && $ret["ok"] && isset($ret["updatedExisting"]) && $ret["updatedExisting"]) {
						$this->changeProducer->publish(
							Change::create()->setProduct($product),
							RoutingKeys::CHANGE_PRODUCT_UPDATE
						);

						break;
					}
				}

			}
		}

		// TODO: delete products not present in feed

		$reader->close();
		libxml_clear_errors();
		unlink($import->getTmpFileName());
		$channel->ack($message);
	}

	private function fillCategoryIds(Product $product)
	{
		$categoryTexts = $product->getCategoryTexts();
		$categoryIds = $product->getCategoryIds();

		for ($i = 0, $l = count($categoryTexts); $i < $l; ++$i) {
			if (isset($categoryIds[$i])) {
				continue;
			}

			$tree = preg_split("/\\s*[|>\\/]\\s*/", $categoryTexts[$i]);

			if (strncasecmp($tree[0], "heureka", 7 /* strlen("heureka") */) === 0) {
				array_shift($tree);
			}

			$tree = array_filter($tree, function ($name) {
				$name = trim($name);
				return !empty($name);
			});

			if (empty($tree)) {
				$categoryIds[$i] = null;
				continue;
			}

			$hash = md5(implode(" | ", $tree));

			/** @var Category $category */
			$category = $this->categoryRepository->findOne(
				[CategoryMeta::ESHOP_ID => $product->getEshopId(), CategoryMeta::HASH => $hash],
				["_id" => 1]
			);

			if ($category) {
				$categoryIds[$i] = $category->getId();
				continue;
			}

			$path = [];
			for ($j = 0, $m = count($tree); $j < $m; ++$j) {
				$treeHash = md5(implode(" | ", array_slice($tree, 0, $j + 1)));
				$treeCategory = new Category();
				$treeCategory
					->setEshopId($product->getEshopId())
					->setHash($treeHash)
					->setName($tree[$j])
					->setPath($path);

				/** @var Category $savedTreeCategory */
				$savedTreeCategory = $this->categoryRepository->findAndModify(
					[CategoryMeta::ESHOP_ID => $treeCategory->getEshopId(), CategoryMeta::HASH => $treeCategory->getHash()],
					CategoryMeta::toArray($treeCategory),
					["_id" => 1],
					["upsert" => true, "new" => true]
				);

				$this->changeProducer->publish(
					Change::create()->setCategory($savedTreeCategory),
					RoutingKeys::CHANGE_CATEGORY_UPDATE
				);

				$path[$j] = $savedTreeCategory->getId();
			}

			$categoryIds[$i] = $path[count($tree) - 1];
		}

		$product->setCategoryIds($categoryIds);
	}

	private function mergeProducts(Product $product, Product $existing)
	{
		$product->setId($existing->getId());
		$product->setV($existing->getV() + 1);
		foreach ($product->getImages() as $image) {
			foreach ($existing->getImages() as $existingImage) {
				if ($image->getUrl() === $existingImage->getUrl()) {
					$image->setFileId($existingImage->getFileId());
				}
			}
		}

		$categoryIds = $product->getCategoryIds();
		foreach ($product->getCategoryTexts() as $i => $categoryText) {
			foreach ($existing->getCategoryTexts() as $j => $existingCategoryText) {
				if ($categoryText === $existingCategoryText) {
					$categoryIds[$i] = $existing->getCategoryIds()[$j];
				}
			}
		}
		$product->setCategoryIds($categoryIds);
	}

}
