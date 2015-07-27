<?php
namespace CC15\Service;

use CC15\Entity\Category;
use CC15\Entity\Meta\CategoryMeta;
use CC15\Entity\Meta\EshopMeta;
use CC15\Entity\Meta\ProductMeta;
use CC15\Repository\CategoryRepository;
use CC15\Repository\ProductRepository;
use CC15\Service\VO\ListingFilter;
use Elasticsearch\Client;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Service;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Tracy\Debugger;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Service
 */
class ListingService
{

	/**
	 * @var Client
	 *
	 * @Autowired
	 */
	public $elasticsearch;

	/**
	 * @var string
	 *
	 * @Value("%elasticsearch.catalog_index_alias_name%")
	 */
	public $catalogIndexAliasName;

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

	public function findProducts(ListingFilter $filter)
	{
		$must = [];

		if ($filter->getEshop() !== null) {
			$must[] = ["term" => [
				ProductMeta::ESHOP_ID => (string)$filter->getEshop()->getId(),
			]];
		}

		if ($filter->getCategory() !== null) {
			/** @var Category[] $childrenCategories */
			$childrenCategories = $this->categoryRepository->find([CategoryMeta::PATH => $filter->getCategory()->getId()]);
			$must[] = ["terms" => [
				ProductMeta::CATEGORY_IDS => array_merge(
					[(string)$filter->getCategory()->getId()],
					array_map(function (Category $category) {
						return (string)$category->getId();
					}, $childrenCategories)
				),
			]];
		}

		$body = [
			"query" => [
				"filtered" => [
					"filter" => ["bool" => [
						"must" => $must,
					]],
				]
			],
			"from" => $filter->getOffset(),
			"size" => $filter->getLimit(),
			"sort" => ["_score" => "desc"],
		];

		if ($filter->getQ() !== null) {
			$body["query"]["filtered"]["query"] = ["multi_match" => [
				"query" => $filter->getQ(),
				"fields" => [
					ProductMeta::NAME . "^5",
					ProductMeta::LONG_NAME . "^5",
					ProductMeta::DESCRIPTION,
					ProductMeta::MANUFACTURER . "^2",
					ProductMeta::BRAND . "^2",
					ProductMeta::ESHOP . "." . EshopMeta::NAME . "^2",
				]
			]];
		}

//		if (empty($body["query"]["filtered"]["filter"]["bool"]["must"])) {
//			unset($body["query"]["filtered"]["filter"]);
//		}

		$response = $this->elasticsearch->search([
			"index" => $this->catalogIndexAliasName,
			"type" => ProductMeta::SHORT_NAME,
			"body" => $body,
		]);

		if (!isset($response["hits"]["hits"])) {
			throw new \RuntimeException("Response does not have hits->hits. Got: " . json_encode($response));
		}

		$products = [];

		foreach ($response["hits"]["hits"] as $hit) {
			$products[] = ProductMeta::fromArray($hit["_source"], "json:");
		}

		return $products;
	}

//	public function findProducts(ListingFilter $filter)
//	{
//		$query = [];
//
//		if ($filter->getEshop() !== null) {
//			$query[ProductMeta::ESHOP_ID] = $filter->getEshop()->getId();
//		}
//
//		if ($filter->getCategory() !== null) {
//			/** @var Category[] $childrenCategories */
//			$childrenCategories = $this->categoryRepository->find([CategoryMeta::PATH => $filter->getCategory()->getId()]);
//			$query[ProductMeta::CATEGORY_IDS] = ['$in' => array_merge(
//				[$filter->getCategory()->getId()],
//				array_map(function (Category $category) {
//					return $category->getId();
//				}, $childrenCategories)
//			)];
//		}
//
//		if ($filter->getQ() !== null) {
//			$query[ProductMeta::NAME] = ['$regex' => $filter->getQ(), '$options' => "i"];
//		}
//
//		return $this->productRepository->find(
//			$query,
//			[],
//			[
//				"sort" => [ProductMeta::NAME => 1],
//				"limit" => $filter->getLimit(),
//				"skip" => $filter->getOffset(),
//			]
//		);
//	}

}
