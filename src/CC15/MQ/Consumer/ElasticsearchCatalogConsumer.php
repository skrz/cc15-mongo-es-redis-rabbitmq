<?php
namespace CC15\MQ\Consumer;

use Bunny\Channel;
use Bunny\Message;
use CC15\Entity\Eshop;
use CC15\Entity\Meta\CategoryMeta;
use CC15\Entity\Meta\EshopMeta;
use CC15\Entity\Meta\FeedMeta;
use CC15\Entity\Meta\ImageMeta;
use CC15\Entity\Meta\ProductMeta;
use CC15\MQ\VO\Change;
use CC15\Repository\CategoryRepository;
use CC15\Repository\EshopRepository;
use Elasticsearch\Client;
use Psr\Log\LoggerInterface;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\Bundle\BunnyBundle\Annotation\Consumer;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Consumer(
 *     queue="elasticsearch_catalog",
 *     meta="CC15\MQ\VO\Meta\ChangeMeta"
 * )
 */
class ElasticsearchCatalogConsumer
{

	/**
	 * @var LoggerInterface
	 *
	 * @Autowired
	 */
	public $log;

	/**
	 * @var CategoryRepository
	 *
	 * @Autowired
	 */
	public $categoryRepository;

	/**
	 * @var EshopRepository
	 *
	 * @Autowired
	 */
	public $eshopRepository;

	/**
	 * @var Client
	 *
	 * @Autowired
	 */
	public $elasticsearch;

	/**
	 * @var string
	 *
	 * @Value("%elasticsearch.catalog_index_logical_name%")
	 */
	public $catalogIndexLogicalName;

	/**
	 * @var string
	 *
	 * @Value("%elasticsearch.catalog_index_alias_name%")
	 */
	public $catalogIndexAliasName;

	public function handleMessage(Change $change, Message $message, Channel $channel)
	{
		if (!$change->getProduct()) {
			throw new \InvalidArgumentException(
				"Badly routed message '{$message->content}' with routing key '{$message->routingKey}'."
			);
		}

		$product = $change->getProduct();
		/** @var Eshop $eshop */
		$eshop = $this->eshopRepository->getOneById($product->getEshopId());
		$product->setEshop($eshop);
		$categoryIds = $product->getCategoryIds();

		if (!empty($categoryIds)) {
			$product->setCategories($this->categoryRepository->find(["_id" => ['$in' => $product->getCategoryIds()]]));
		}

		if (!$this->elasticsearch->indices()->existsAlias(["name" => $this->catalogIndexAliasName])) {
			$this->initIndex();
		}

		$response = $this->elasticsearch->index([
			"index" => $this->catalogIndexAliasName,
			"type" => ProductMeta::SHORT_NAME,
			"id" => (string)$product->getId(),
			"version" => $product->getV(),
			"version_type" => "external_gte",
			"body" => ProductMeta::toObject($product, "json:"),
			//"refresh" => true,
		]);

		$this->log->info("Indexed Product#{$product->getId()} (v={$product->getV()}, created=" . json_encode($response["created"]) . ").");

		$channel->ack($message);
	}

	private function initIndex()
	{
		$newCatalogVersion = $this->getLatestVersionOfIndex($this->catalogIndexLogicalName) + 1;
		$newCatalogIndexPhysicalName = "{$this->catalogIndexLogicalName}_v{$newCatalogVersion}";

		$response = $this->elasticsearch->indices()->create([
			"index" => $newCatalogIndexPhysicalName,
			"body" => [
				"settings" => [
					"analysis" => [
						"analyzer" => [
							"default" => [
								"type" => "custom",
								"tokenizer" => "standard",
								"filter" => [
									"lowercase",
									"cs_predlozky",
									"cs_spojky",
									/* "cities_stems", */
									/* "custom_stems", */
									/* ... */
									"cs_hunspell",
									"asciifolding"
								],
							],
						],
						"filter" => [
							"cs_hunspell" => [
								"type" => "hunspell",
								"locale" => "cs_CZ",
								"dedup" => true,
								"recursion_level" => 0
							],
							"cs_predlozky" => [
								"type" => "stop",
								"stopwords" => ["od", "z", "s", "do", "bez", "krom", "kromě", "místo", "podle", "podél", "kolem", "okolo", "u", "vedle", "během", "pomocí", "stran", "prostřednictvím", "za", "k", "proti", "naproti", "kvůli", "díky", "vůči", "pro", "za", "před", "mimo", "na", "pod", "pode", "nad", "nade", "mezi", "krom", "kromě", "skrz", "skrze", "o", "po", "v", "při", "s", "za", "před", "mezi"],
							],
							"cs_spojky" => [
								"type" => "stop",
								"stopwords" => ["a", "i"],
							],
						],
					],
				],
				"mappings" => [
					ProductMeta::SHORT_NAME => ["properties" => [
						ProductMeta::ID => ["type" => "string", "index" => "not_analyzed"],
						ProductMeta::V => ["type" => "long"],
						ProductMeta::ESHOP_ID => ["type" => "string", "index" => "not_analyzed"],
						ProductMeta::ESHOP => ["properties" => [
							EshopMeta::ID => ["type" => "string", "index" => "not_analyzed"],
							EshopMeta::NAME => ["type" => "string"],
							EshopMeta::SLUG => ["type" => "string", "index" => "not_analyzed"],
							EshopMeta::URL => ["type" => "string"],
							EshopMeta::FEEDS => ["properties" => [
								FeedMeta::ID => ["type" => "string", "index" => "not_analyzed"],
								FeedMeta::URL => ["type" => "string"],
							]],
						]],
						ProductMeta::ITEM_GROUP_ID => ["type" => "string", "index" => "not_analyzed"],
						ProductMeta::ITEM_ID => ["type" => "string", "index" => "not_analyzed"],
						ProductMeta::NAME => ["type" => "string"],
						ProductMeta::LONG_NAME => ["type" => "string"],
						ProductMeta::DESCRIPTION => ["type" => "string"],
						ProductMeta::URL => ["type" => "string"],
						ProductMeta::PRICE => ["type" => "float"],
						ProductMeta::DELIVERY_DATE => ["type" => "integer"],
						ProductMeta::IMAGES => ["properties" => [
							ImageMeta::URL => ["type" => "string"],
							ImageMeta::FILE_ID => ["type" => "string", "index" => "not_analyzed"],
						]],
						ProductMeta::EAN => ["type" => "string"],
						ProductMeta::ISBN => ["type" => "string"],
						ProductMeta::PRODUCTNO => ["type" => "string"],
						ProductMeta::MANUFACTURER => ["type" => "string"],
						ProductMeta::BRAND => ["type" => "string"],
						ProductMeta::CATEGORY_TEXTS => ["type" => "string"],
						ProductMeta::CATEGORY_IDS => ["type" => "string", "index" => "not_analyzed"],
						ProductMeta::CATEGORIES => ["properties" => [
							CategoryMeta::ID => ["type" => "string", "index" => "not_analyzed"],
							CategoryMeta::ESHOP_ID => ["type" => "string", "index" => "not_analyzed"],
							CategoryMeta::HASH => ["type" => "string", "index" => "not_analyzed"],
							CategoryMeta::NAME => ["type" => "string"],
							CategoryMeta::PATH => ["type" => "string", "index" => "not_analyzed"],
						]],
						ProductMeta::ITEM_TYPE => ["type" => "string", "index" => "not_analyzed"],
						ProductMeta::EXTRA_MESSAGES => ["type" => "string", "index" => "not_analyzed"],
					]],
				],
			],
		]);

		if (!isset($response["acknowledged"]) || !$response["acknowledged"]) {
			throw new \RuntimeException("Elasticsearch responded with: " . json_encode($response));
		}

		$this->elasticsearch->indices()->putAlias([
			"name" => $this->catalogIndexAliasName,
			"index" => $newCatalogIndexPhysicalName,
		]);
	}

	private function getLatestVersionOfIndex($indexLogicalName)
	{
		$max = 0;
		foreach ($this->elasticsearch->indices()->getAliases() as $index => $aliases) {
			if (preg_match("/^{$indexLogicalName}_v([0-9]+)$/", $index, $match)) {
				$v = intval($match[1]);
				if ($v > $max) {
					$max = $v;
				}
			}
		}

		return $max;
	}

}
