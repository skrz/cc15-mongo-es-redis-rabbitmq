<?php
namespace CC15\MQ\VO\Meta;

use CC15\Entity\Meta\CategoryMeta;
use CC15\Entity\Meta\ProductMeta;
use CC15\MQ\VO\Change;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\MQ\VO\Change
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class ChangeMeta extends Change implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\MQ\VO\Change';
	const SHORT_NAME = 'Change';
	const ENTITY_NAME = 'change';
	const PRODUCT = 'product';
	const CATEGORY = 'category';


	/** @var ChangeMeta */
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
	 * @return ChangeMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\MQ\VO\Change
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Change
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Change();
			case 1:
				return new Change(func_get_arg(0));
			case 2:
				return new Change(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Change(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Change(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Change(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Change(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Change(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Change(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\MQ\VO\Change to default values
	 *
	 *
	 * @param Change $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Change)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Change.');
		}
		$object->product = NULL;
		$object->category = NULL;
	}


	/**
	 * Creates \CC15\MQ\VO\Change object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Change $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Change
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Change' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Change();
		} elseif (!($object instanceof Change)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Change.');
		}

		if (($id & 1) > 0 && isset($input['product'])) {
			$object->product = ProductMeta::fromArray($input['product'], $group, isset($object->product) ? $object->product : null);
		} elseif (($id & 1) > 0 && array_key_exists('product', $input) && $input['product'] === NULL) {
			$object->product = NULL;
		}
		if (($id & 2) > 0 && isset($input['product'])) {
			$object->product = ProductMeta::fromArray($input['product'], $group, isset($object->product) ? $object->product : null);
		} elseif (($id & 2) > 0 && array_key_exists('product', $input) && $input['product'] === NULL) {
			$object->product = NULL;
		}

		if (($id & 1) > 0 && isset($input['category'])) {
			$object->category = CategoryMeta::fromArray($input['category'], $group, isset($object->category) ? $object->category : null);
		} elseif (($id & 1) > 0 && array_key_exists('category', $input) && $input['category'] === NULL) {
			$object->category = NULL;
		}
		if (($id & 2) > 0 && isset($input['category'])) {
			$object->category = CategoryMeta::fromArray($input['category'], $group, isset($object->category) ? $object->category : null);
		} elseif (($id & 2) > 0 && array_key_exists('category', $input) && $input['category'] === NULL) {
			$object->category = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\MQ\VO\Change to array
	 *
	 * @param Change $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Change' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Change)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Change.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['product'] = ProductMeta::toArray($object->product, $group);
		}
		if (($id & 2) > 0 && isset($object->product)) {
			$output['product'] = ProductMeta::toArray($object->product, $group);
		}

		if (($id & 1) > 0) {
			$output['category'] = CategoryMeta::toArray($object->category, $group);
		}
		if (($id & 2) > 0 && isset($object->category)) {
			$output['category'] = CategoryMeta::toArray($object->category, $group);
		}

		return $output;
	}


	/**
	 * Creates \CC15\MQ\VO\Change object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Change $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Change
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Change' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Change();
		} elseif (!($object instanceof Change)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Change.');
		}

		if (($id & 1) > 0 && isset($input['product'])) {
			$object->product = ProductMeta::fromObject($input['product'], $group, isset($object->product) ? $object->product : null);
		} elseif (($id & 1) > 0 && array_key_exists('product', $input) && $input['product'] === NULL) {
			$object->product = NULL;
		}
		if (($id & 2) > 0 && isset($input['product'])) {
			$object->product = ProductMeta::fromObject($input['product'], $group, isset($object->product) ? $object->product : null);
		} elseif (($id & 2) > 0 && array_key_exists('product', $input) && $input['product'] === NULL) {
			$object->product = NULL;
		}

		if (($id & 1) > 0 && isset($input['category'])) {
			$object->category = CategoryMeta::fromObject($input['category'], $group, isset($object->category) ? $object->category : null);
		} elseif (($id & 1) > 0 && array_key_exists('category', $input) && $input['category'] === NULL) {
			$object->category = NULL;
		}
		if (($id & 2) > 0 && isset($input['category'])) {
			$object->category = CategoryMeta::fromObject($input['category'], $group, isset($object->category) ? $object->category : null);
		} elseif (($id & 2) > 0 && array_key_exists('category', $input) && $input['category'] === NULL) {
			$object->category = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\MQ\VO\Change to object
	 *
	 * @param Change $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Change' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Change)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Change.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['product'] = ProductMeta::toObject($object->product, $group);
		}
		if (($id & 2) > 0 && isset($object->product)) {
			$output['product'] = ProductMeta::toObject($object->product, $group);
		}

		if (($id & 1) > 0) {
			$output['category'] = CategoryMeta::toObject($object->category, $group);
		}
		if (($id & 2) > 0 && isset($object->category)) {
			$output['category'] = CategoryMeta::toObject($object->category, $group);
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\MQ\VO\Change from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Change $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Change
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
	 * Serializes \CC15\MQ\VO\Change to JSON string
	 *
	 * @param Change $object
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
	 * Serializes \CC15\MQ\VO\Change to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Change $object
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
	 * Serializes \CC15\MQ\VO\Change to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Change $object
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
