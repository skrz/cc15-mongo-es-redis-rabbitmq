<?php
namespace CC15\Entity\Meta;

use CC15\Entity\Eshop;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\Entity\Eshop
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class EshopMeta extends Eshop implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\Entity\Eshop';
	const SHORT_NAME = 'Eshop';
	const ENTITY_NAME = 'eshop';
	const ID = 'id';
	const NAME = 'name';
	const SLUG = 'slug';
	const URL = 'url';
	const FEEDS = 'feeds';


	/** @var EshopMeta */
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
	 * @return EshopMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\Entity\Eshop
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Eshop
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Eshop();
			case 1:
				return new Eshop(func_get_arg(0));
			case 2:
				return new Eshop(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Eshop(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Eshop(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Eshop(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Eshop(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Eshop(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Eshop(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\Entity\Eshop to default values
	 *
	 *
	 * @param Eshop $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Eshop)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Eshop.');
		}
		$object->id = NULL;
		$object->name = NULL;
		$object->slug = NULL;
		$object->url = NULL;
		$object->feeds = array (
		);
	}


	/**
	 * Creates \CC15\Entity\Eshop object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Eshop $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Eshop
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Eshop' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Eshop();
		} elseif (!($object instanceof Eshop)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Eshop.');
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

		if (($id & 1) > 0 && isset($input['slug'])) {
			$object->slug = $input['slug'];
		} elseif (($id & 1) > 0 && array_key_exists('slug', $input) && $input['slug'] === NULL) {
			$object->slug = NULL;
		}
		if (($id & 2) > 0 && isset($input['slug'])) {
			$object->slug = $input['slug'];
		} elseif (($id & 2) > 0 && array_key_exists('slug', $input) && $input['slug'] === NULL) {
			$object->slug = NULL;
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

		if (($id & 1) > 0 && isset($input['feeds'])) {
			if (!(isset($object->feeds) && is_array($object->feeds))) {
				$object->feeds = array();
			}
			foreach ((array)$input['feeds'] as $k0 => $v0) {
				$object->feeds[$k0] = FeedMeta::fromArray($v0, $group, isset($object->feeds[$k0]) ? $object->feeds[$k0] : null);
			}
		} elseif (($id & 1) > 0 && array_key_exists('feeds', $input) && $input['feeds'] === NULL) {
			$object->feeds = NULL;
		}
		if (($id & 2) > 0 && isset($input['feeds'])) {
			if (!(isset($object->feeds) && is_array($object->feeds))) {
				$object->feeds = array();
			}
			foreach ((array)$input['feeds'] as $k0 => $v0) {
				$object->feeds[$k0] = FeedMeta::fromArray($v0, $group, isset($object->feeds[$k0]) ? $object->feeds[$k0] : null);
			}
		} elseif (($id & 2) > 0 && array_key_exists('feeds', $input) && $input['feeds'] === NULL) {
			$object->feeds = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Eshop to array
	 *
	 * @param Eshop $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Eshop' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Eshop)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Eshop.');
		}

		$output = array();

		if (($id & 1) > 0 && isset($object->id)) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['name'] = $object->name;
		}
		if (($id & 2) > 0 && isset($object->name)) {
			$output['name'] = $object->name;
		}

		if (($id & 1) > 0) {
			$output['slug'] = $object->slug;
		}
		if (($id & 2) > 0 && isset($object->slug)) {
			$output['slug'] = $object->slug;
		}

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['feeds']) && is_array($output['feeds']))) {
				$output['feeds'] = array();
			}
			foreach ((array)$object->feeds as $k0 => $v0) {
				$output['feeds'][$k0] = FeedMeta::toArray($v0, $group);
			}
		}
		if (($id & 2) > 0 && isset($object->feeds)) {
			if (!(isset($output['feeds']) && is_array($output['feeds']))) {
				$output['feeds'] = array();
			}
			foreach ((array)$object->feeds as $k0 => $v0) {
				$output['feeds'][$k0] = FeedMeta::toArray($v0, $group);
			}
		}

		return $output;
	}


	/**
	 * Creates \CC15\Entity\Eshop object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Eshop $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Eshop
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Eshop' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Eshop();
		} elseif (!($object instanceof Eshop)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Eshop.');
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

		if (($id & 1) > 0 && isset($input['slug'])) {
			$object->slug = $input['slug'];
		} elseif (($id & 1) > 0 && array_key_exists('slug', $input) && $input['slug'] === NULL) {
			$object->slug = NULL;
		}
		if (($id & 2) > 0 && isset($input['slug'])) {
			$object->slug = $input['slug'];
		} elseif (($id & 2) > 0 && array_key_exists('slug', $input) && $input['slug'] === NULL) {
			$object->slug = NULL;
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

		if (($id & 1) > 0 && isset($input['feeds'])) {
			if (!(isset($object->feeds) && is_array($object->feeds))) {
				$object->feeds = array();
			}
			foreach ((array)$input['feeds'] as $k0 => $v0) {
				$object->feeds[$k0] = FeedMeta::fromObject($v0, $group, isset($object->feeds[$k0]) ? $object->feeds[$k0] : null);
			}
		} elseif (($id & 1) > 0 && array_key_exists('feeds', $input) && $input['feeds'] === NULL) {
			$object->feeds = NULL;
		}
		if (($id & 2) > 0 && isset($input['feeds'])) {
			if (!(isset($object->feeds) && is_array($object->feeds))) {
				$object->feeds = array();
			}
			foreach ((array)$input['feeds'] as $k0 => $v0) {
				$object->feeds[$k0] = FeedMeta::fromObject($v0, $group, isset($object->feeds[$k0]) ? $object->feeds[$k0] : null);
			}
		} elseif (($id & 2) > 0 && array_key_exists('feeds', $input) && $input['feeds'] === NULL) {
			$object->feeds = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Eshop to object
	 *
	 * @param Eshop $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Eshop' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Eshop)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Eshop.');
		}

		$output = array();

		if (($id & 1) > 0 && isset($object->id)) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['name'] = $object->name;
		}
		if (($id & 2) > 0 && isset($object->name)) {
			$output['name'] = $object->name;
		}

		if (($id & 1) > 0) {
			$output['slug'] = $object->slug;
		}
		if (($id & 2) > 0 && isset($object->slug)) {
			$output['slug'] = $object->slug;
		}

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			if (!(isset($output['feeds']) && is_array($output['feeds']))) {
				$output['feeds'] = array();
			}
			foreach ((array)$object->feeds as $k0 => $v0) {
				$output['feeds'][$k0] = FeedMeta::toObject($v0, $group);
			}
		}
		if (($id & 2) > 0 && isset($object->feeds)) {
			if (!(isset($output['feeds']) && is_array($output['feeds']))) {
				$output['feeds'] = array();
			}
			foreach ((array)$object->feeds as $k0 => $v0) {
				$output['feeds'][$k0] = FeedMeta::toObject($v0, $group);
			}
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\Entity\Eshop from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Eshop $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Eshop
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
	 * Serializes \CC15\Entity\Eshop to JSON string
	 *
	 * @param Eshop $object
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
	 * Serializes \CC15\Entity\Eshop to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Eshop $object
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
	 * Serializes \CC15\Entity\Eshop to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Eshop $object
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
