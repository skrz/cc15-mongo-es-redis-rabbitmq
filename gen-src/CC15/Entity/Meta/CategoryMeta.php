<?php
namespace CC15\Entity\Meta;

use CC15\Entity\Category;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\Entity\Category
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class CategoryMeta extends Category implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\Entity\Category';
	const SHORT_NAME = 'Category';
	const ENTITY_NAME = 'category';
	const ID = 'id';
	const ESHOP_ID = 'eshopId';
	const HASH = 'hash';
	const NAME = 'name';
	const PATH = 'path';


	/** @var CategoryMeta */
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
	 * @return CategoryMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\Entity\Category
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Category
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Category();
			case 1:
				return new Category(func_get_arg(0));
			case 2:
				return new Category(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Category(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Category(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Category(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Category(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Category(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Category(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\Entity\Category to default values
	 *
	 *
	 * @param Category $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Category)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Category.');
		}
		$object->id = NULL;
		$object->eshopId = NULL;
		$object->hash = NULL;
		$object->name = NULL;
		$object->path = array (
		);
	}


	/**
	 * Creates \CC15\Entity\Category object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Category $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Category
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Category' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Category();
		} elseif (!($object instanceof Category)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Category.');
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

		if (($id & 1) > 0 && isset($input['hash'])) {
			$object->hash = $input['hash'];
		} elseif (($id & 1) > 0 && array_key_exists('hash', $input) && $input['hash'] === NULL) {
			$object->hash = NULL;
		}
		if (($id & 2) > 0 && isset($input['hash'])) {
			$object->hash = $input['hash'];
		} elseif (($id & 2) > 0 && array_key_exists('hash', $input) && $input['hash'] === NULL) {
			$object->hash = NULL;
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

		if (($id & 1) > 0 && isset($input['path'])) {
			if (!(isset($object->path) && is_array($object->path))) {
				$object->path = array();
			}
			foreach ((array)$input['path'] as $k0 => $v0) {
				$object->path[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('path', $input) && $input['path'] === NULL) {
			$object->path = NULL;
		}
		if (($id & 2) > 0 && isset($input['path'])) {
			if (!(isset($object->path) && is_array($object->path))) {
				$object->path = array();
			}
			foreach ((array)$input['path'] as $k0 => $v0) {
				$object->path[$k0] = new \MongoId($v0);
			}
		} elseif (($id & 2) > 0 && array_key_exists('path', $input) && $input['path'] === NULL) {
			$object->path = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Category to array
	 *
	 * @param Category $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Category' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Category)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Category.');
		}

		$output = array();

		if (($id & 1) > 0 && isset($object->id)) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['eshopId'] = $object->eshopId;
		}
		if (($id & 2) > 0 && isset($object->eshopId)) {
			$output['eshopId'] = (string)$object->eshopId;
		}

		if (($id & 1) > 0) {
			$output['hash'] = $object->hash;
		}
		if (($id & 2) > 0 && isset($object->hash)) {
			$output['hash'] = $object->hash;
		}

		if (($id & 1) > 0) {
			$output['name'] = $object->name;
		}
		if (($id & 2) > 0 && isset($object->name)) {
			$output['name'] = $object->name;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['path']) && is_array($output['path']))) {
				$output['path'] = array();
			}
			foreach ((array)$object->path as $k0 => $v0) {
				$output['path'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->path)) {
			if (!(isset($output['path']) && is_array($output['path']))) {
				$output['path'] = array();
			}
			foreach ((array)$object->path as $k0 => $v0) {
				$output['path'][$k0] = (string)$v0;
			}
		}

		return $output;
	}


	/**
	 * Creates \CC15\Entity\Category object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Category $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Category
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Category' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Category();
		} elseif (!($object instanceof Category)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Category.');
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

		if (($id & 1) > 0 && isset($input['hash'])) {
			$object->hash = $input['hash'];
		} elseif (($id & 1) > 0 && array_key_exists('hash', $input) && $input['hash'] === NULL) {
			$object->hash = NULL;
		}
		if (($id & 2) > 0 && isset($input['hash'])) {
			$object->hash = $input['hash'];
		} elseif (($id & 2) > 0 && array_key_exists('hash', $input) && $input['hash'] === NULL) {
			$object->hash = NULL;
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

		if (($id & 1) > 0 && isset($input['path'])) {
			if (!(isset($object->path) && is_array($object->path))) {
				$object->path = array();
			}
			foreach ((array)$input['path'] as $k0 => $v0) {
				$object->path[$k0] = $v0;
			}
		} elseif (($id & 1) > 0 && array_key_exists('path', $input) && $input['path'] === NULL) {
			$object->path = NULL;
		}
		if (($id & 2) > 0 && isset($input['path'])) {
			if (!(isset($object->path) && is_array($object->path))) {
				$object->path = array();
			}
			foreach ((array)$input['path'] as $k0 => $v0) {
				$object->path[$k0] = new \MongoId($v0);
			}
		} elseif (($id & 2) > 0 && array_key_exists('path', $input) && $input['path'] === NULL) {
			$object->path = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Category to object
	 *
	 * @param Category $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Category' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Category)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Category.');
		}

		$output = array();

		if (($id & 1) > 0 && isset($object->id)) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['eshopId'] = $object->eshopId;
		}
		if (($id & 2) > 0 && isset($object->eshopId)) {
			$output['eshopId'] = (string)$object->eshopId;
		}

		if (($id & 1) > 0) {
			$output['hash'] = $object->hash;
		}
		if (($id & 2) > 0 && isset($object->hash)) {
			$output['hash'] = $object->hash;
		}

		if (($id & 1) > 0) {
			$output['name'] = $object->name;
		}
		if (($id & 2) > 0 && isset($object->name)) {
			$output['name'] = $object->name;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['path']) && is_array($output['path']))) {
				$output['path'] = array();
			}
			foreach ((array)$object->path as $k0 => $v0) {
				$output['path'][$k0] = $v0;
			}
		}
		if (($id & 2) > 0 && isset($object->path)) {
			if (!(isset($output['path']) && is_array($output['path']))) {
				$output['path'] = array();
			}
			foreach ((array)$object->path as $k0 => $v0) {
				$output['path'][$k0] = (string)$v0;
			}
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\Entity\Category from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Category $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Category
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
	 * Serializes \CC15\Entity\Category to JSON string
	 *
	 * @param Category $object
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
	 * Serializes \CC15\Entity\Category to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Category $object
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
	 * Serializes \CC15\Entity\Category to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Category $object
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
