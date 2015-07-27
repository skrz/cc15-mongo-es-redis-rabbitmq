<?php
namespace CC15\Entity\Meta;

use CC15\Entity\Product;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\Entity\Product
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class ProductMeta extends Product implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\Entity\Product';
	const SHORT_NAME = 'Product';
	const ENTITY_NAME = 'product';
	const ID = 'id';
	const V = 'v';
	const ESHOP_ID = 'eshopId';
	const ESHOP = 'eshop';
	const ITEM_GROUP_ID = 'itemGroupId';
	const ITEM_ID = 'itemId';
	const NAME = 'name';
	const LONG_NAME = 'longName';
	const DESCRIPTION = 'description';
	const URL = 'url';
	const PRICE = 'price';
	const DELIVERY_DATE = 'deliveryDate';
	const IMAGES = 'images';
	const EAN = 'ean';
	const ISBN = 'isbn';
	const PRODUCTNO = 'productno';
	const MANUFACTURER = 'manufacturer';
	const BRAND = 'brand';
	const CATEGORY_TEXTS = 'categoryTexts';
	const CATEGORY_IDS = 'categoryIds';
	const CATEGORIES = 'categories';
	const ITEM_TYPE = 'itemType';
	const EXTRA_MESSAGES = 'extraMessages';


	/** @var ProductMeta */
	private static $instance;

	/**
	 * Mapping from group name to group ID for fromArray() and toArray()
	 *
	 * @var string[]
	 */
	private static $groups = array('' => 1, 'json:' => 2);


	/**
	 * Constructor
	 */
	private function __construct()
	{
		self::$instance = $this; // avoids cyclic dependency stack overflow
	}


	/**
	 * Returns instance of this meta class
	 *
	 * @return ProductMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\Entity\Product
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Product
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Product();
			case 1:
				return new Product(func_get_arg(0));
			case 2:
				return new Product(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Product(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Product(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Product(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Product(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Product(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Product(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\Entity\Product to default values
	 *
	 *
	 * @param Product $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Product)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Product.');
		}
		$object->id = NULL;
		$object->v = 1;
		$object->eshopId = NULL;
		$object->eshop = NULL;
		$object->itemGroupId = NULL;
		$object->itemId = NULL;
		$object->name = NULL;
		$object->longName = NULL;
		$object->description = NULL;
		$object->url = NULL;
		$object->price = NULL;
		$object->deliveryDate = NULL;
		$object->images = array (
		);
		$object->ean = NULL;
		$object->isbn = NULL;
		$object->productno = NULL;
		$object->manufacturer = NULL;
		$object->brand = NULL;
		$object->categoryTexts = array (
		);
		$object->categoryIds = array (
		);
		$object->categories = NULL;
		$object->itemType = 'NEW';
		$object->extraMessages = array (
		);
	}


	/**
	 * Creates \CC15\Entity\Product object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Product $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Product
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Product' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Product();
		} elseif (!($object instanceof Product)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Product.');
		}

		if (($id & 1) > 0 && isset($input['_id'])) {
			$object->id = $input['_id'];
		} elseif (($id & 1) > 0 && array_key_exists('_id', $input) && $input['_id'] === NULL) {
			$object->id = NULL;
		}
		if (($id & 2) > 0 && isset($input['id'])) {
			$object->id = new \MongoId($input['id']);
		} elseif (($id & 2) > 0 && array_key_exists('id', $input) && $input['id'] === NULL) {
			$object->id = NULL;
		}

		if (($id & 1) > 0 && isset($input['v'])) {
			$object->v = $input['v'];
		} elseif (($id & 1) > 0 && array_key_exists('v', $input) && $input['v'] === NULL) {
			$object->v = NULL;
		}
		if (($id & 2) > 0 && isset($input['v'])) {
			$object->v = $input['v'];
		} elseif (($id & 2) > 0 && array_key_exists('v', $input) && $input['v'] === NULL) {
			$object->v = NULL;
		}

		if (($id & 1) > 0 && isset($input['eshopId'])) {
			$object->eshopId = $input['eshopId'];
		} elseif (($id & 1) > 0 && array_key_exists('eshopId', $input) && $input['eshopId'] === NULL) {
			$object->eshopId = NULL;
		}
		if (($id & 2) > 0 && isset($input['eshopId'])) {
			$object->eshopId = new \MongoId($input['eshopId']);
		} elseif (($id & 2) > 0 && array_key_exists('eshopId', $input) && $input['eshopId'] === NULL) {
			$object->eshopId = NULL;
		}

		if (($id & 1) > 0 && isset($input['eshop'])) {
			$object->eshop = EshopMeta::fromArray($input['eshop'], $group, isset($object->eshop) ? $object->eshop : null);
		} elseif (($id & 1) > 0 && array_key_exists('eshop', $input) && $input['eshop'] === NULL) {
			$object->eshop = NULL;
		}
		if (($id & 2) > 0 && isset($input['eshop'])) {
			$object->eshop = EshopMeta::fromArray($input['eshop'], $group, isset($object->eshop) ? $object->eshop : null);
		} elseif (($id & 2) > 0 && array_key_exists('eshop', $input) && $input['eshop'] === NULL) {
			$object->eshop = NULL;
		}

		if (($id & 1) > 0 && isset($input['itemGroupId'])) {
			$object->itemGroupId = $input['itemGroupId'];
		} elseif (($id & 1) > 0 && array_key_exists('itemGroupId', $input) && $input['itemGroupId'] === NULL) {
			$object->itemGroupId = NULL;
		}
		if (($id & 2) > 0 && isset($input['itemGroupId'])) {
			$object->itemGroupId = $input['itemGroupId'];
		} elseif (($id & 2) > 0 && array_key_exists('itemGroupId', $input) && $input['itemGroupId'] === NULL) {
			$object->itemGroupId = NULL;
		}

		if (($id & 1) > 0 && isset($input['itemId'])) {
			$object->itemId = $input['itemId'];
		} elseif (($id & 1) > 0 && array_key_exists('itemId', $input) && $input['itemId'] === NULL) {
			$object->itemId = NULL;
		}
		if (($id & 2) > 0 && isset($input['itemId'])) {
			$object->itemId = $input['itemId'];
		} elseif (($id & 2) > 0 && array_key_exists('itemId', $input) && $input['itemId'] === NULL) {
			$object->itemId = NULL;
		}

		if (($id & 1) > 0 && isset($input['name'])) {
			$object->name = $input['name'];
		} elseif (($id & 1) > 0 && array_key_exists('name', $input) && $input['name'] === NULL) {
			$object->name = NULL;
		}
		if (($id & 2) > 0 && isset($input['name'])) {
			$object->name = $input['name'];
		} elseif (($id & 2) > 0 && array_key_exists('name', $input) && $input['name'] === NULL) {
			$object->name = NULL;
		}

		if (($id & 1) > 0 && isset($input['longName'])) {
			$object->longName = $input['longName'];
		} elseif (($id & 1) > 0 && array_key_exists('longName', $input) && $input['longName'] === NULL) {
			$object->longName = NULL;
		}
		if (($id & 2) > 0 && isset($input['longName'])) {
			$object->longName = $input['longName'];
		} elseif (($id & 2) > 0 && array_key_exists('longName', $input) && $input['longName'] === NULL) {
			$object->longName = NULL;
		}

		if (($id & 1) > 0 && isset($input['description'])) {
			$object->description = $input['description'];
		} elseif (($id & 1) > 0 && array_key_exists('description', $input) && $input['description'] === NULL) {
			$object->description = NULL;
		}
		if (($id & 2) > 0 && isset($input['description'])) {
			$object->description = $input['description'];
		} elseif (($id & 2) > 0 && array_key_exists('description', $input) && $input['description'] === NULL) {
			$object->description = NULL;
		}

		if (($id & 1) > 0 && isset($input['url'])) {
			$object->url = $input['url'];
		} elseif (($id & 1) > 0 && array_key_exists('url', $input) && $input['url'] === NULL) {
			$object->url = NULL;
		}
		if (($id & 2) > 0 && isset($input['url'])) {
			$object->url = $input['url'];
		} elseif (($id & 2) > 0 && array_key_exists('url', $input) && $input['url'] === NULL) {
			$object->url = NULL;
		}

		if (($id & 1) > 0 && isset($input['price'])) {
			$object->price = $input['price'];
		} elseif (($id & 1) > 0 && array_key_exists('price', $input) && $input['price'] === NULL) {
			$object->price = NULL;
		}
		if (($id & 2) > 0 && isset($input['price'])) {
			$object->price = $input['price'];
		} elseif (($id & 2) > 0 && array_key_exists('price', $input) && $input['price'] === NULL) {
			$object->price = NULL;
		}

		if (($id & 1) > 0 && isset($input['deliveryDate'])) {
			$object->deliveryDate = $input['deliveryDate'];
		} elseif (($id & 1) > 0 && array_key_exists('deliveryDate', $input) && $input['deliveryDate'] === NULL) {
			$object->deliveryDate = NULL;
		}
		if (($id & 2) > 0 && isset($input['deliveryDate'])) {
			$object->deliveryDate = $input['deliveryDate'];
		} elseif (($id & 2) > 0 && array_key_exists('deliveryDate', $input) && $input['deliveryDate'] === NULL) {
			$object->deliveryDate = NULL;
		}

		if (($id & 1) > 0 && isset($input['images'])) {
			if (!(isset($object->images) && is_array($object->images))) {
				$object->images = array();
			}
			foreach ((array)$input['images'] as $k0 => $v0) {
				$object->images[$k0] = ImageMeta::fromArray($v0, $group, isset($object->images[$k0]) ? $object->images[$k0] : null);
			}
		} elseif (($id & 1) > 0 && array_key_exists('images', $input) && $input['images'] === NULL) {
			$object->images = NULL;
		}
		if (($id & 2) > 0 && isset($input['images'])) {
			if (!(isset($object->images) && is_array($object->images))) {
				$object->images = array();
			}
			foreach ((array)$input['images'] as $k0 => $v0) {
				$object->images[$k0] = ImageMeta::fromArray($v0, $group, isset($object->images[$k0]) ? $object->images[$k0] : null);
			}
		} elseif (($id & 2) > 0 && array_key_exists('images', $input) && $input['images'] === NULL) {
			$object->images = NULL;
		}

		if (($id & 1) > 0 && isset($input['ean'])) {
			$object->ean = $input['ean'];
		} elseif (($id & 1) > 0 && array_key_exists('ean', $input) && $input['ean'] === NULL) {
			$object->ean = NULL;
		}
		if (($id & 2) > 0 && isset($input['ean'])) {
			$object->ean = $input['ean'];
		} elseif (($id & 2) > 0 && array_key_exists('ean', $input) && $input['ean'] === NULL) {
			$object->ean = NULL;
		}

		if (($id & 1) > 0 && isset($input['isbn'])) {
			$object->isbn = $input['isbn'];
		} elseif (($id & 1) > 0 && array_key_exists('isbn', $input) && $input['isbn'] === NULL) {
			$object->isbn = NULL;
		}
		if (($id & 2) > 0 && isset($input['isbn'])) {
			$object->isbn = $input['isbn'];
		} elseif (($id & 2) > 0 && array_key_exists('isbn', $input) && $input['isbn'] === NULL) {
			$object->isbn = NULL;
		}

		if (($id & 1) > 0 && isset($input['productno'])) {
			$object->productno = $input['productno'];
		} elseif (($id & 1) > 0 && array_key_exists('productno', $input) && $input['productno'] === NULL) {
			$object->productno = NULL;
		}
		if (($id & 2) > 0 && isset($input['productno'])) {
			$object->productno = $input['productno'];
		} elseif (($id & 2) > 0 && array_key_exists('productno', $input) && $input['productno'] === NULL) {
			$object->productno = NULL;
		}

		if (($id & 1) > 0 && isset($input['manufacturer'])) {
			$object->manufacturer = $input['manufacturer'];
		} elseif (($id & 1) > 0 && array_key_exists('manufacturer', $input) && $input['manufacturer'] === NULL) {
			$object->manufacturer = NULL;
		}
		if (($id & 2) > 0 && isset($input['manufacturer'])) {
			$object->manufacturer = $input['manufacturer'];
		} elseif (($id & 2) > 0 && array_key_exists('manufacturer', $input) && $input['manufacturer'] === NULL) {
			$object->manufacturer = NULL;
		}

		if (($id & 1) > 0 && isset($input['brand'])) {
			$object->brand = $input['brand'];
		} elseif (($id & 1) > 0 && array_key_exists('brand', $input) && $input['brand'] === NULL) {
			$object->brand = NULL;
		}
		if (($id & 2) > 0 && isset($input['brand'])) {
			$object->brand = $input['brand'];
		} elseif (($id & 2) > 0 && array_key_exists('brand', $input) && $input['brand'] === NULL) {
			$object->brand = NULL;
		}

		if (($id & 1) > 0 && isset($input['categoryTexts'])) {
			if (!(isset($object->categoryTexts) && is_array($object->categoryTexts))) {
				$object->categoryTexts = array();
			}
			foreach ((array)$input['categoryTexts'] as $k0 => $v0) {
				$object->categoryTexts[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('categoryTexts', $input) && $input['categoryTexts'] === NULL) {
			$object->categoryTexts = NULL;
		}
		if (($id & 2) > 0 && isset($input['categoryTexts'])) {
			if (!(isset($object->categoryTexts) && is_array($object->categoryTexts))) {
				$object->categoryTexts = array();
			}
			foreach ((array)$input['categoryTexts'] as $k0 => $v0) {
				$object->categoryTexts[$k0] = $v0;
			}
		} elseif (($id & 2) > 0 && array_key_exists('categoryTexts', $input) && $input['categoryTexts'] === NULL) {
			$object->categoryTexts = NULL;
		}

		if (($id & 1) > 0 && isset($input['categoryIds'])) {
			if (!(isset($object->categoryIds) && is_array($object->categoryIds))) {
				$object->categoryIds = array();
			}
			foreach ((array)$input['categoryIds'] as $k0 => $v0) {
				$object->categoryIds[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('categoryIds', $input) && $input['categoryIds'] === NULL) {
			$object->categoryIds = NULL;
		}
		if (($id & 2) > 0 && isset($input['categoryIds'])) {
			if (!(isset($object->categoryIds) && is_array($object->categoryIds))) {
				$object->categoryIds = array();
			}
			foreach ((array)$input['categoryIds'] as $k0 => $v0) {
				$object->categoryIds[$k0] = new \MongoId($v0);
			}
		} elseif (($id & 2) > 0 && array_key_exists('categoryIds', $input) && $input['categoryIds'] === NULL) {
			$object->categoryIds = NULL;
		}

		if (($id & 1) > 0 && isset($input['categories'])) {
			if (!(isset($object->categories) && is_array($object->categories))) {
				$object->categories = array();
			}
			foreach ((array)$input['categories'] as $k0 => $v0) {
				$object->categories[$k0] = CategoryMeta::fromArray($v0, $group, isset($object->categories[$k0]) ? $object->categories[$k0] : null);
			}
		} elseif (($id & 1) > 0 && array_key_exists('categories', $input) && $input['categories'] === NULL) {
			$object->categories = NULL;
		}
		if (($id & 2) > 0 && isset($input['categories'])) {
			if (!(isset($object->categories) && is_array($object->categories))) {
				$object->categories = array();
			}
			foreach ((array)$input['categories'] as $k0 => $v0) {
				$object->categories[$k0] = CategoryMeta::fromArray($v0, $group, isset($object->categories[$k0]) ? $object->categories[$k0] : null);
			}
		} elseif (($id & 2) > 0 && array_key_exists('categories', $input) && $input['categories'] === NULL) {
			$object->categories = NULL;
		}

		if (($id & 1) > 0 && isset($input['itemType'])) {
			$object->itemType = $input['itemType'];
		} elseif (($id & 1) > 0 && array_key_exists('itemType', $input) && $input['itemType'] === NULL) {
			$object->itemType = NULL;
		}
		if (($id & 2) > 0 && isset($input['itemType'])) {
			$object->itemType = $input['itemType'];
		} elseif (($id & 2) > 0 && array_key_exists('itemType', $input) && $input['itemType'] === NULL) {
			$object->itemType = NULL;
		}

		if (($id & 1) > 0 && isset($input['extraMessages'])) {
			if (!(isset($object->extraMessages) && is_array($object->extraMessages))) {
				$object->extraMessages = array();
			}
			foreach ((array)$input['extraMessages'] as $k0 => $v0) {
				$object->extraMessages[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('extraMessages', $input) && $input['extraMessages'] === NULL) {
			$object->extraMessages = NULL;
		}
		if (($id & 2) > 0 && isset($input['extraMessages'])) {
			if (!(isset($object->extraMessages) && is_array($object->extraMessages))) {
				$object->extraMessages = array();
			}
			foreach ((array)$input['extraMessages'] as $k0 => $v0) {
				$object->extraMessages[$k0] = $v0;
			}
		} elseif (($id & 2) > 0 && array_key_exists('extraMessages', $input) && $input['extraMessages'] === NULL) {
			$object->extraMessages = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Product to array
	 *
	 * @param Product $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return array
	 */
	public static function toArray($object, $group = NULL)
	{
		if ($object === null) {
			return null;
		}
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Product' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Product)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Product.');
		}

		$output = array();

		if (($id & 1) > 0 && isset($object->id)) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['v'] = $object->v;
		}
		if (($id & 2) > 0 && isset($object->v)) {
			$output['v'] = $object->v;
		}

		if (($id & 1) > 0) {
			$output['eshopId'] = $object->eshopId;
		}
		if (($id & 2) > 0 && isset($object->eshopId)) {
			$output['eshopId'] = (string)$object->eshopId;
		}

		if (($id & 1) > 0) {
			$output['eshop'] = EshopMeta::toArray($object->eshop, $group);
		}
		if (($id & 2) > 0 && isset($object->eshop)) {
			$output['eshop'] = EshopMeta::toArray($object->eshop, $group);
		}

		if (($id & 1) > 0) {
			$output['itemGroupId'] = $object->itemGroupId;
		}
		if (($id & 2) > 0 && isset($object->itemGroupId)) {
			$output['itemGroupId'] = $object->itemGroupId;
		}

		if (($id & 1) > 0) {
			$output['itemId'] = $object->itemId;
		}
		if (($id & 2) > 0 && isset($object->itemId)) {
			$output['itemId'] = $object->itemId;
		}

		if (($id & 1) > 0) {
			$output['name'] = $object->name;
		}
		if (($id & 2) > 0 && isset($object->name)) {
			$output['name'] = $object->name;
		}

		if (($id & 1) > 0) {
			$output['longName'] = $object->longName;
		}
		if (($id & 2) > 0 && isset($object->longName)) {
			$output['longName'] = $object->longName;
		}

		if (($id & 1) > 0) {
			$output['description'] = $object->description;
		}
		if (($id & 2) > 0 && isset($object->description)) {
			$output['description'] = $object->description;
		}

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			$output['price'] = $object->price;
		}
		if (($id & 2) > 0 && isset($object->price)) {
			$output['price'] = $object->price;
		}

		if (($id & 1) > 0) {
			$output['deliveryDate'] = $object->deliveryDate;
		}
		if (($id & 2) > 0 && isset($object->deliveryDate)) {
			$output['deliveryDate'] = $object->deliveryDate;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['images']) && is_array($output['images']))) {
				$output['images'] = array();
			}
			foreach ((array)$object->images as $k0 => $v0) {
				$output['images'][$k0] = ImageMeta::toArray($v0, $group);
			}
		}
		if (($id & 2) > 0 && isset($object->images)) {
			if (!(isset($output['images']) && is_array($output['images']))) {
				$output['images'] = array();
			}
			foreach ((array)$object->images as $k0 => $v0) {
				$output['images'][$k0] = ImageMeta::toArray($v0, $group);
			}
		}

		if (($id & 1) > 0) {
			$output['ean'] = $object->ean;
		}
		if (($id & 2) > 0 && isset($object->ean)) {
			$output['ean'] = $object->ean;
		}

		if (($id & 1) > 0) {
			$output['isbn'] = $object->isbn;
		}
		if (($id & 2) > 0 && isset($object->isbn)) {
			$output['isbn'] = $object->isbn;
		}

		if (($id & 1) > 0) {
			$output['productno'] = $object->productno;
		}
		if (($id & 2) > 0 && isset($object->productno)) {
			$output['productno'] = $object->productno;
		}

		if (($id & 1) > 0) {
			$output['manufacturer'] = $object->manufacturer;
		}
		if (($id & 2) > 0 && isset($object->manufacturer)) {
			$output['manufacturer'] = $object->manufacturer;
		}

		if (($id & 1) > 0) {
			$output['brand'] = $object->brand;
		}
		if (($id & 2) > 0 && isset($object->brand)) {
			$output['brand'] = $object->brand;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['categoryTexts']) && is_array($output['categoryTexts']))) {
				$output['categoryTexts'] = array();
			}
			foreach ((array)$object->categoryTexts as $k0 => $v0) {
				$output['categoryTexts'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->categoryTexts)) {
			if (!(isset($output['categoryTexts']) && is_array($output['categoryTexts']))) {
				$output['categoryTexts'] = array();
			}
			foreach ((array)$object->categoryTexts as $k0 => $v0) {
				$output['categoryTexts'][$k0] = $v0;
			}
		}

		if (($id & 1) > 0) {
			if (!(isset($output['categoryIds']) && is_array($output['categoryIds']))) {
				$output['categoryIds'] = array();
			}
			foreach ((array)$object->categoryIds as $k0 => $v0) {
				$output['categoryIds'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->categoryIds)) {
			if (!(isset($output['categoryIds']) && is_array($output['categoryIds']))) {
				$output['categoryIds'] = array();
			}
			foreach ((array)$object->categoryIds as $k0 => $v0) {
				$output['categoryIds'][$k0] = (string)$v0;
			}
		}

		if (($id & 1) > 0) {
			if (!(isset($output['categories']) && is_array($output['categories']))) {
				$output['categories'] = array();
			}
			foreach ((array)$object->categories as $k0 => $v0) {
				$output['categories'][$k0] = CategoryMeta::toArray($v0, $group);
			}
		}
		if (($id & 2) > 0 && isset($object->categories)) {
			if (!(isset($output['categories']) && is_array($output['categories']))) {
				$output['categories'] = array();
			}
			foreach ((array)$object->categories as $k0 => $v0) {
				$output['categories'][$k0] = CategoryMeta::toArray($v0, $group);
			}
		}

		if (($id & 1) > 0) {
			$output['itemType'] = $object->itemType;
		}
		if (($id & 2) > 0 && isset($object->itemType)) {
			$output['itemType'] = $object->itemType;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['extraMessages']) && is_array($output['extraMessages']))) {
				$output['extraMessages'] = array();
			}
			foreach ((array)$object->extraMessages as $k0 => $v0) {
				$output['extraMessages'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->extraMessages)) {
			if (!(isset($output['extraMessages']) && is_array($output['extraMessages']))) {
				$output['extraMessages'] = array();
			}
			foreach ((array)$object->extraMessages as $k0 => $v0) {
				$output['extraMessages'][$k0] = $v0;
			}
		}

		return $output;
	}


	/**
	 * Creates \CC15\Entity\Product object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Product $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Product
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Product' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Product();
		} elseif (!($object instanceof Product)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Product.');
		}

		if (($id & 1) > 0 && isset($input['_id'])) {
			$object->id = $input['_id'];
		} elseif (($id & 1) > 0 && array_key_exists('_id', $input) && $input['_id'] === NULL) {
			$object->id = NULL;
		}
		if (($id & 2) > 0 && isset($input['id'])) {
			$object->id = new \MongoId($input['id']);
		} elseif (($id & 2) > 0 && array_key_exists('id', $input) && $input['id'] === NULL) {
			$object->id = NULL;
		}

		if (($id & 1) > 0 && isset($input['v'])) {
			$object->v = $input['v'];
		} elseif (($id & 1) > 0 && array_key_exists('v', $input) && $input['v'] === NULL) {
			$object->v = NULL;
		}
		if (($id & 2) > 0 && isset($input['v'])) {
			$object->v = $input['v'];
		} elseif (($id & 2) > 0 && array_key_exists('v', $input) && $input['v'] === NULL) {
			$object->v = NULL;
		}

		if (($id & 1) > 0 && isset($input['eshopId'])) {
			$object->eshopId = $input['eshopId'];
		} elseif (($id & 1) > 0 && array_key_exists('eshopId', $input) && $input['eshopId'] === NULL) {
			$object->eshopId = NULL;
		}
		if (($id & 2) > 0 && isset($input['eshopId'])) {
			$object->eshopId = new \MongoId($input['eshopId']);
		} elseif (($id & 2) > 0 && array_key_exists('eshopId', $input) && $input['eshopId'] === NULL) {
			$object->eshopId = NULL;
		}

		if (($id & 1) > 0 && isset($input['eshop'])) {
			$object->eshop = EshopMeta::fromObject($input['eshop'], $group, isset($object->eshop) ? $object->eshop : null);
		} elseif (($id & 1) > 0 && array_key_exists('eshop', $input) && $input['eshop'] === NULL) {
			$object->eshop = NULL;
		}
		if (($id & 2) > 0 && isset($input['eshop'])) {
			$object->eshop = EshopMeta::fromObject($input['eshop'], $group, isset($object->eshop) ? $object->eshop : null);
		} elseif (($id & 2) > 0 && array_key_exists('eshop', $input) && $input['eshop'] === NULL) {
			$object->eshop = NULL;
		}

		if (($id & 1) > 0 && isset($input['itemGroupId'])) {
			$object->itemGroupId = $input['itemGroupId'];
		} elseif (($id & 1) > 0 && array_key_exists('itemGroupId', $input) && $input['itemGroupId'] === NULL) {
			$object->itemGroupId = NULL;
		}
		if (($id & 2) > 0 && isset($input['itemGroupId'])) {
			$object->itemGroupId = $input['itemGroupId'];
		} elseif (($id & 2) > 0 && array_key_exists('itemGroupId', $input) && $input['itemGroupId'] === NULL) {
			$object->itemGroupId = NULL;
		}

		if (($id & 1) > 0 && isset($input['itemId'])) {
			$object->itemId = $input['itemId'];
		} elseif (($id & 1) > 0 && array_key_exists('itemId', $input) && $input['itemId'] === NULL) {
			$object->itemId = NULL;
		}
		if (($id & 2) > 0 && isset($input['itemId'])) {
			$object->itemId = $input['itemId'];
		} elseif (($id & 2) > 0 && array_key_exists('itemId', $input) && $input['itemId'] === NULL) {
			$object->itemId = NULL;
		}

		if (($id & 1) > 0 && isset($input['name'])) {
			$object->name = $input['name'];
		} elseif (($id & 1) > 0 && array_key_exists('name', $input) && $input['name'] === NULL) {
			$object->name = NULL;
		}
		if (($id & 2) > 0 && isset($input['name'])) {
			$object->name = $input['name'];
		} elseif (($id & 2) > 0 && array_key_exists('name', $input) && $input['name'] === NULL) {
			$object->name = NULL;
		}

		if (($id & 1) > 0 && isset($input['longName'])) {
			$object->longName = $input['longName'];
		} elseif (($id & 1) > 0 && array_key_exists('longName', $input) && $input['longName'] === NULL) {
			$object->longName = NULL;
		}
		if (($id & 2) > 0 && isset($input['longName'])) {
			$object->longName = $input['longName'];
		} elseif (($id & 2) > 0 && array_key_exists('longName', $input) && $input['longName'] === NULL) {
			$object->longName = NULL;
		}

		if (($id & 1) > 0 && isset($input['description'])) {
			$object->description = $input['description'];
		} elseif (($id & 1) > 0 && array_key_exists('description', $input) && $input['description'] === NULL) {
			$object->description = NULL;
		}
		if (($id & 2) > 0 && isset($input['description'])) {
			$object->description = $input['description'];
		} elseif (($id & 2) > 0 && array_key_exists('description', $input) && $input['description'] === NULL) {
			$object->description = NULL;
		}

		if (($id & 1) > 0 && isset($input['url'])) {
			$object->url = $input['url'];
		} elseif (($id & 1) > 0 && array_key_exists('url', $input) && $input['url'] === NULL) {
			$object->url = NULL;
		}
		if (($id & 2) > 0 && isset($input['url'])) {
			$object->url = $input['url'];
		} elseif (($id & 2) > 0 && array_key_exists('url', $input) && $input['url'] === NULL) {
			$object->url = NULL;
		}

		if (($id & 1) > 0 && isset($input['price'])) {
			$object->price = $input['price'];
		} elseif (($id & 1) > 0 && array_key_exists('price', $input) && $input['price'] === NULL) {
			$object->price = NULL;
		}
		if (($id & 2) > 0 && isset($input['price'])) {
			$object->price = $input['price'];
		} elseif (($id & 2) > 0 && array_key_exists('price', $input) && $input['price'] === NULL) {
			$object->price = NULL;
		}

		if (($id & 1) > 0 && isset($input['deliveryDate'])) {
			$object->deliveryDate = $input['deliveryDate'];
		} elseif (($id & 1) > 0 && array_key_exists('deliveryDate', $input) && $input['deliveryDate'] === NULL) {
			$object->deliveryDate = NULL;
		}
		if (($id & 2) > 0 && isset($input['deliveryDate'])) {
			$object->deliveryDate = $input['deliveryDate'];
		} elseif (($id & 2) > 0 && array_key_exists('deliveryDate', $input) && $input['deliveryDate'] === NULL) {
			$object->deliveryDate = NULL;
		}

		if (($id & 1) > 0 && isset($input['images'])) {
			if (!(isset($object->images) && is_array($object->images))) {
				$object->images = array();
			}
			foreach ((array)$input['images'] as $k0 => $v0) {
				$object->images[$k0] = ImageMeta::fromObject($v0, $group, isset($object->images[$k0]) ? $object->images[$k0] : null);
			}
		} elseif (($id & 1) > 0 && array_key_exists('images', $input) && $input['images'] === NULL) {
			$object->images = NULL;
		}
		if (($id & 2) > 0 && isset($input['images'])) {
			if (!(isset($object->images) && is_array($object->images))) {
				$object->images = array();
			}
			foreach ((array)$input['images'] as $k0 => $v0) {
				$object->images[$k0] = ImageMeta::fromObject($v0, $group, isset($object->images[$k0]) ? $object->images[$k0] : null);
			}
		} elseif (($id & 2) > 0 && array_key_exists('images', $input) && $input['images'] === NULL) {
			$object->images = NULL;
		}

		if (($id & 1) > 0 && isset($input['ean'])) {
			$object->ean = $input['ean'];
		} elseif (($id & 1) > 0 && array_key_exists('ean', $input) && $input['ean'] === NULL) {
			$object->ean = NULL;
		}
		if (($id & 2) > 0 && isset($input['ean'])) {
			$object->ean = $input['ean'];
		} elseif (($id & 2) > 0 && array_key_exists('ean', $input) && $input['ean'] === NULL) {
			$object->ean = NULL;
		}

		if (($id & 1) > 0 && isset($input['isbn'])) {
			$object->isbn = $input['isbn'];
		} elseif (($id & 1) > 0 && array_key_exists('isbn', $input) && $input['isbn'] === NULL) {
			$object->isbn = NULL;
		}
		if (($id & 2) > 0 && isset($input['isbn'])) {
			$object->isbn = $input['isbn'];
		} elseif (($id & 2) > 0 && array_key_exists('isbn', $input) && $input['isbn'] === NULL) {
			$object->isbn = NULL;
		}

		if (($id & 1) > 0 && isset($input['productno'])) {
			$object->productno = $input['productno'];
		} elseif (($id & 1) > 0 && array_key_exists('productno', $input) && $input['productno'] === NULL) {
			$object->productno = NULL;
		}
		if (($id & 2) > 0 && isset($input['productno'])) {
			$object->productno = $input['productno'];
		} elseif (($id & 2) > 0 && array_key_exists('productno', $input) && $input['productno'] === NULL) {
			$object->productno = NULL;
		}

		if (($id & 1) > 0 && isset($input['manufacturer'])) {
			$object->manufacturer = $input['manufacturer'];
		} elseif (($id & 1) > 0 && array_key_exists('manufacturer', $input) && $input['manufacturer'] === NULL) {
			$object->manufacturer = NULL;
		}
		if (($id & 2) > 0 && isset($input['manufacturer'])) {
			$object->manufacturer = $input['manufacturer'];
		} elseif (($id & 2) > 0 && array_key_exists('manufacturer', $input) && $input['manufacturer'] === NULL) {
			$object->manufacturer = NULL;
		}

		if (($id & 1) > 0 && isset($input['brand'])) {
			$object->brand = $input['brand'];
		} elseif (($id & 1) > 0 && array_key_exists('brand', $input) && $input['brand'] === NULL) {
			$object->brand = NULL;
		}
		if (($id & 2) > 0 && isset($input['brand'])) {
			$object->brand = $input['brand'];
		} elseif (($id & 2) > 0 && array_key_exists('brand', $input) && $input['brand'] === NULL) {
			$object->brand = NULL;
		}

		if (($id & 1) > 0 && isset($input['categoryTexts'])) {
			if (!(isset($object->categoryTexts) && is_array($object->categoryTexts))) {
				$object->categoryTexts = array();
			}
			foreach ((array)$input['categoryTexts'] as $k0 => $v0) {
				$object->categoryTexts[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('categoryTexts', $input) && $input['categoryTexts'] === NULL) {
			$object->categoryTexts = NULL;
		}
		if (($id & 2) > 0 && isset($input['categoryTexts'])) {
			if (!(isset($object->categoryTexts) && is_array($object->categoryTexts))) {
				$object->categoryTexts = array();
			}
			foreach ((array)$input['categoryTexts'] as $k0 => $v0) {
				$object->categoryTexts[$k0] = $v0;
			}
		} elseif (($id & 2) > 0 && array_key_exists('categoryTexts', $input) && $input['categoryTexts'] === NULL) {
			$object->categoryTexts = NULL;
		}

		if (($id & 1) > 0 && isset($input['categoryIds'])) {
			if (!(isset($object->categoryIds) && is_array($object->categoryIds))) {
				$object->categoryIds = array();
			}
			foreach ((array)$input['categoryIds'] as $k0 => $v0) {
				$object->categoryIds[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('categoryIds', $input) && $input['categoryIds'] === NULL) {
			$object->categoryIds = NULL;
		}
		if (($id & 2) > 0 && isset($input['categoryIds'])) {
			if (!(isset($object->categoryIds) && is_array($object->categoryIds))) {
				$object->categoryIds = array();
			}
			foreach ((array)$input['categoryIds'] as $k0 => $v0) {
				$object->categoryIds[$k0] = new \MongoId($v0);
			}
		} elseif (($id & 2) > 0 && array_key_exists('categoryIds', $input) && $input['categoryIds'] === NULL) {
			$object->categoryIds = NULL;
		}

		if (($id & 1) > 0 && isset($input['categories'])) {
			if (!(isset($object->categories) && is_array($object->categories))) {
				$object->categories = array();
			}
			foreach ((array)$input['categories'] as $k0 => $v0) {
				$object->categories[$k0] = CategoryMeta::fromObject($v0, $group, isset($object->categories[$k0]) ? $object->categories[$k0] : null);
			}
		} elseif (($id & 1) > 0 && array_key_exists('categories', $input) && $input['categories'] === NULL) {
			$object->categories = NULL;
		}
		if (($id & 2) > 0 && isset($input['categories'])) {
			if (!(isset($object->categories) && is_array($object->categories))) {
				$object->categories = array();
			}
			foreach ((array)$input['categories'] as $k0 => $v0) {
				$object->categories[$k0] = CategoryMeta::fromObject($v0, $group, isset($object->categories[$k0]) ? $object->categories[$k0] : null);
			}
		} elseif (($id & 2) > 0 && array_key_exists('categories', $input) && $input['categories'] === NULL) {
			$object->categories = NULL;
		}

		if (($id & 1) > 0 && isset($input['itemType'])) {
			$object->itemType = $input['itemType'];
		} elseif (($id & 1) > 0 && array_key_exists('itemType', $input) && $input['itemType'] === NULL) {
			$object->itemType = NULL;
		}
		if (($id & 2) > 0 && isset($input['itemType'])) {
			$object->itemType = $input['itemType'];
		} elseif (($id & 2) > 0 && array_key_exists('itemType', $input) && $input['itemType'] === NULL) {
			$object->itemType = NULL;
		}

		if (($id & 1) > 0 && isset($input['extraMessages'])) {
			if (!(isset($object->extraMessages) && is_array($object->extraMessages))) {
				$object->extraMessages = array();
			}
			foreach ((array)$input['extraMessages'] as $k0 => $v0) {
				$object->extraMessages[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('extraMessages', $input) && $input['extraMessages'] === NULL) {
			$object->extraMessages = NULL;
		}
		if (($id & 2) > 0 && isset($input['extraMessages'])) {
			if (!(isset($object->extraMessages) && is_array($object->extraMessages))) {
				$object->extraMessages = array();
			}
			foreach ((array)$input['extraMessages'] as $k0 => $v0) {
				$object->extraMessages[$k0] = $v0;
			}
		} elseif (($id & 2) > 0 && array_key_exists('extraMessages', $input) && $input['extraMessages'] === NULL) {
			$object->extraMessages = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Product to object
	 *
	 * @param Product $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return object
	 */
	public static function toObject($object, $group = NULL)
	{
		if ($object === null) {
			return null;
		}
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Product' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Product)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Product.');
		}

		$output = array();

		if (($id & 1) > 0 && isset($object->id)) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['v'] = $object->v;
		}
		if (($id & 2) > 0 && isset($object->v)) {
			$output['v'] = $object->v;
		}

		if (($id & 1) > 0) {
			$output['eshopId'] = $object->eshopId;
		}
		if (($id & 2) > 0 && isset($object->eshopId)) {
			$output['eshopId'] = (string)$object->eshopId;
		}

		if (($id & 1) > 0) {
			$output['eshop'] = EshopMeta::toObject($object->eshop, $group);
		}
		if (($id & 2) > 0 && isset($object->eshop)) {
			$output['eshop'] = EshopMeta::toObject($object->eshop, $group);
		}

		if (($id & 1) > 0) {
			$output['itemGroupId'] = $object->itemGroupId;
		}
		if (($id & 2) > 0 && isset($object->itemGroupId)) {
			$output['itemGroupId'] = $object->itemGroupId;
		}

		if (($id & 1) > 0) {
			$output['itemId'] = $object->itemId;
		}
		if (($id & 2) > 0 && isset($object->itemId)) {
			$output['itemId'] = $object->itemId;
		}

		if (($id & 1) > 0) {
			$output['name'] = $object->name;
		}
		if (($id & 2) > 0 && isset($object->name)) {
			$output['name'] = $object->name;
		}

		if (($id & 1) > 0) {
			$output['longName'] = $object->longName;
		}
		if (($id & 2) > 0 && isset($object->longName)) {
			$output['longName'] = $object->longName;
		}

		if (($id & 1) > 0) {
			$output['description'] = $object->description;
		}
		if (($id & 2) > 0 && isset($object->description)) {
			$output['description'] = $object->description;
		}

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			$output['price'] = $object->price;
		}
		if (($id & 2) > 0 && isset($object->price)) {
			$output['price'] = $object->price;
		}

		if (($id & 1) > 0) {
			$output['deliveryDate'] = $object->deliveryDate;
		}
		if (($id & 2) > 0 && isset($object->deliveryDate)) {
			$output['deliveryDate'] = $object->deliveryDate;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['images']) && is_array($output['images']))) {
				$output['images'] = array();
			}
			foreach ((array)$object->images as $k0 => $v0) {
				$output['images'][$k0] = ImageMeta::toObject($v0, $group);
			}
		}
		if (($id & 2) > 0 && isset($object->images)) {
			if (!(isset($output['images']) && is_array($output['images']))) {
				$output['images'] = array();
			}
			foreach ((array)$object->images as $k0 => $v0) {
				$output['images'][$k0] = ImageMeta::toObject($v0, $group);
			}
		}

		if (($id & 1) > 0) {
			$output['ean'] = $object->ean;
		}
		if (($id & 2) > 0 && isset($object->ean)) {
			$output['ean'] = $object->ean;
		}

		if (($id & 1) > 0) {
			$output['isbn'] = $object->isbn;
		}
		if (($id & 2) > 0 && isset($object->isbn)) {
			$output['isbn'] = $object->isbn;
		}

		if (($id & 1) > 0) {
			$output['productno'] = $object->productno;
		}
		if (($id & 2) > 0 && isset($object->productno)) {
			$output['productno'] = $object->productno;
		}

		if (($id & 1) > 0) {
			$output['manufacturer'] = $object->manufacturer;
		}
		if (($id & 2) > 0 && isset($object->manufacturer)) {
			$output['manufacturer'] = $object->manufacturer;
		}

		if (($id & 1) > 0) {
			$output['brand'] = $object->brand;
		}
		if (($id & 2) > 0 && isset($object->brand)) {
			$output['brand'] = $object->brand;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['categoryTexts']) && is_array($output['categoryTexts']))) {
				$output['categoryTexts'] = array();
			}
			foreach ((array)$object->categoryTexts as $k0 => $v0) {
				$output['categoryTexts'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->categoryTexts)) {
			if (!(isset($output['categoryTexts']) && is_array($output['categoryTexts']))) {
				$output['categoryTexts'] = array();
			}
			foreach ((array)$object->categoryTexts as $k0 => $v0) {
				$output['categoryTexts'][$k0] = $v0;
			}
		}

		if (($id & 1) > 0) {
			if (!(isset($output['categoryIds']) && is_array($output['categoryIds']))) {
				$output['categoryIds'] = array();
			}
			foreach ((array)$object->categoryIds as $k0 => $v0) {
				$output['categoryIds'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->categoryIds)) {
			if (!(isset($output['categoryIds']) && is_array($output['categoryIds']))) {
				$output['categoryIds'] = array();
			}
			foreach ((array)$object->categoryIds as $k0 => $v0) {
				$output['categoryIds'][$k0] = (string)$v0;
			}
		}

		if (($id & 1) > 0) {
			if (!(isset($output['categories']) && is_array($output['categories']))) {
				$output['categories'] = array();
			}
			foreach ((array)$object->categories as $k0 => $v0) {
				$output['categories'][$k0] = CategoryMeta::toObject($v0, $group);
			}
		}
		if (($id & 2) > 0 && isset($object->categories)) {
			if (!(isset($output['categories']) && is_array($output['categories']))) {
				$output['categories'] = array();
			}
			foreach ((array)$object->categories as $k0 => $v0) {
				$output['categories'][$k0] = CategoryMeta::toObject($v0, $group);
			}
		}

		if (($id & 1) > 0) {
			$output['itemType'] = $object->itemType;
		}
		if (($id & 2) > 0 && isset($object->itemType)) {
			$output['itemType'] = $object->itemType;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['extraMessages']) && is_array($output['extraMessages']))) {
				$output['extraMessages'] = array();
			}
			foreach ((array)$object->extraMessages as $k0 => $v0) {
				$output['extraMessages'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->extraMessages)) {
			if (!(isset($output['extraMessages']) && is_array($output['extraMessages']))) {
				$output['extraMessages'] = array();
			}
			foreach ((array)$object->extraMessages as $k0 => $v0) {
				$output['extraMessages'][$k0] = $v0;
			}
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\Entity\Product from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Product $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Product
	 */
	public static function fromJson($json, $group = NULL, $object = NULL)
	{
		if (is_array($json)) {
			// ok, nothing to do here
		} elseif (is_string($json)) {
			$decoded = json_decode($json, true);
			if ($decoded === null && $json !== '' && strcasecmp($json, 'null')) {
				throw new \InvalidArgumentException('Could not decode given JSON: ' . $json . '.');
			}
			$json = $decoded;
		} else {
			throw new \InvalidArgumentException('Expected array, or string, ' . gettype($json) . ' given.');
		}

		return self::fromObject($json, 'json:' . $group, $object);
	}


	/**
	 * Serializes \CC15\Entity\Product to JSON string
	 *
	 * @param Product $object
	 * @param string $group
	 * @param int $options
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return string
	 */
	public static function toJson($object, $group = NULL, $options = 0)
	{
		return json_encode(self::toObject($object, 'json:' . $group), $options);
	}


	/**
	 * Serializes \CC15\Entity\Product to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Product $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @deprecated
	 *
	 * @return string
	 */
	public static function toJsonString($object, $group = NULL)
	{
		return self::toJson($object, $group);
	}


	/**
	 * Serializes \CC15\Entity\Product to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Product $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @deprecated
	 *
	 * @return string
	 */
	public static function toJsonStringPretty($object, $group = NULL)
	{
		return self::toJson($object, $group, JSON_PRETTY_PRINT);
	}

}
