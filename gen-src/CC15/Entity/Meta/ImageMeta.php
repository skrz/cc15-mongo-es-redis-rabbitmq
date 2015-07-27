<?php
namespace CC15\Entity\Meta;

use CC15\Entity\Image;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\Entity\Image
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class ImageMeta extends Image implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\Entity\Image';
	const SHORT_NAME = 'Image';
	const ENTITY_NAME = 'image';
	const URL = 'url';
	const FILE_ID = 'fileId';


	/** @var ImageMeta */
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
	 * @return ImageMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\Entity\Image
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Image
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Image();
			case 1:
				return new Image(func_get_arg(0));
			case 2:
				return new Image(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Image(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Image(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Image(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Image(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Image(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Image(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\Entity\Image to default values
	 *
	 *
	 * @param Image $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Image)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Image.');
		}
		$object->url = NULL;
		$object->fileId = NULL;
	}


	/**
	 * Creates \CC15\Entity\Image object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Image $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Image
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Image' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Image();
		} elseif (!($object instanceof Image)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Image.');
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

		if (($id & 1) > 0 && isset($input['fileId'])) {
			$object->fileId = $input['fileId'];
		} elseif (($id & 1) > 0 && array_key_exists('fileId', $input) && $input['fileId'] === NULL) {
			$object->fileId = NULL;
		}
		if (($id & 2) > 0 && isset($input['fileId'])) {
			$object->fileId = new \MongoId($input['fileId']);
		} elseif (($id & 2) > 0 && array_key_exists('fileId', $input) && $input['fileId'] === NULL) {
			$object->fileId = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Image to array
	 *
	 * @param Image $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Image' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Image)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Image.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			$output['fileId'] = $object->fileId;
		}
		if (($id & 2) > 0 && isset($object->fileId)) {
			$output['fileId'] = (string)$object->fileId;
		}

		return $output;
	}


	/**
	 * Creates \CC15\Entity\Image object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Image $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Image
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Image' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Image();
		} elseif (!($object instanceof Image)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Image.');
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

		if (($id & 1) > 0 && isset($input['fileId'])) {
			$object->fileId = $input['fileId'];
		} elseif (($id & 1) > 0 && array_key_exists('fileId', $input) && $input['fileId'] === NULL) {
			$object->fileId = NULL;
		}
		if (($id & 2) > 0 && isset($input['fileId'])) {
			$object->fileId = new \MongoId($input['fileId']);
		} elseif (($id & 2) > 0 && array_key_exists('fileId', $input) && $input['fileId'] === NULL) {
			$object->fileId = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Image to object
	 *
	 * @param Image $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Image' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Image)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Image.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			$output['fileId'] = $object->fileId;
		}
		if (($id & 2) > 0 && isset($object->fileId)) {
			$output['fileId'] = (string)$object->fileId;
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\Entity\Image from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Image $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Image
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
	 * Serializes \CC15\Entity\Image to JSON string
	 *
	 * @param Image $object
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
	 * Serializes \CC15\Entity\Image to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Image $object
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
	 * Serializes \CC15\Entity\Image to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Image $object
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
