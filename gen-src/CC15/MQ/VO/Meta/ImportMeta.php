<?php
namespace CC15\MQ\VO\Meta;

use CC15\Entity\Meta\EshopMeta;
use CC15\Entity\Meta\FeedMeta;
use CC15\MQ\VO\Import;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\MQ\VO\Import
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class ImportMeta extends Import implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\MQ\VO\Import';
	const SHORT_NAME = 'Import';
	const ENTITY_NAME = 'import';
	const ESHOP = 'eshop';
	const FEED = 'feed';
	const TMP_FILE_NAME = 'tmpFileName';


	/** @var ImportMeta */
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
	 * @return ImportMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\MQ\VO\Import
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Import
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Import();
			case 1:
				return new Import(func_get_arg(0));
			case 2:
				return new Import(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Import(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Import(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Import(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Import(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Import(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Import(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\MQ\VO\Import to default values
	 *
	 *
	 * @param Import $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Import)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Import.');
		}
		$object->eshop = NULL;
		$object->feed = NULL;
		$object->tmpFileName = NULL;
	}


	/**
	 * Creates \CC15\MQ\VO\Import object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Import $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Import
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Import' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Import();
		} elseif (!($object instanceof Import)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Import.');
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

		if (($id & 1) > 0 && isset($input['feed'])) {
			$object->feed = FeedMeta::fromArray($input['feed'], $group, isset($object->feed) ? $object->feed : null);
		} elseif (($id & 1) > 0 && array_key_exists('feed', $input) && $input['feed'] === NULL) {
			$object->feed = NULL;
		}
		if (($id & 2) > 0 && isset($input['feed'])) {
			$object->feed = FeedMeta::fromArray($input['feed'], $group, isset($object->feed) ? $object->feed : null);
		} elseif (($id & 2) > 0 && array_key_exists('feed', $input) && $input['feed'] === NULL) {
			$object->feed = NULL;
		}

		if (($id & 1) > 0 && isset($input['tmpFileName'])) {
			$object->tmpFileName = $input['tmpFileName'];
		} elseif (($id & 1) > 0 && array_key_exists('tmpFileName', $input) && $input['tmpFileName'] === NULL) {
			$object->tmpFileName = NULL;
		}
		if (($id & 2) > 0 && isset($input['tmpFileName'])) {
			$object->tmpFileName = $input['tmpFileName'];
		} elseif (($id & 2) > 0 && array_key_exists('tmpFileName', $input) && $input['tmpFileName'] === NULL) {
			$object->tmpFileName = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\MQ\VO\Import to array
	 *
	 * @param Import $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Import' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Import)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Import.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['eshop'] = EshopMeta::toArray($object->eshop, $group);
		}
		if (($id & 2) > 0 && isset($object->eshop)) {
			$output['eshop'] = EshopMeta::toArray($object->eshop, $group);
		}

		if (($id & 1) > 0) {
			$output['feed'] = FeedMeta::toArray($object->feed, $group);
		}
		if (($id & 2) > 0 && isset($object->feed)) {
			$output['feed'] = FeedMeta::toArray($object->feed, $group);
		}

		if (($id & 1) > 0) {
			$output['tmpFileName'] = $object->tmpFileName;
		}
		if (($id & 2) > 0 && isset($object->tmpFileName)) {
			$output['tmpFileName'] = $object->tmpFileName;
		}

		return $output;
	}


	/**
	 * Creates \CC15\MQ\VO\Import object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Import $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Import
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Import' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Import();
		} elseif (!($object instanceof Import)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Import.');
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

		if (($id & 1) > 0 && isset($input['feed'])) {
			$object->feed = FeedMeta::fromObject($input['feed'], $group, isset($object->feed) ? $object->feed : null);
		} elseif (($id & 1) > 0 && array_key_exists('feed', $input) && $input['feed'] === NULL) {
			$object->feed = NULL;
		}
		if (($id & 2) > 0 && isset($input['feed'])) {
			$object->feed = FeedMeta::fromObject($input['feed'], $group, isset($object->feed) ? $object->feed : null);
		} elseif (($id & 2) > 0 && array_key_exists('feed', $input) && $input['feed'] === NULL) {
			$object->feed = NULL;
		}

		if (($id & 1) > 0 && isset($input['tmpFileName'])) {
			$object->tmpFileName = $input['tmpFileName'];
		} elseif (($id & 1) > 0 && array_key_exists('tmpFileName', $input) && $input['tmpFileName'] === NULL) {
			$object->tmpFileName = NULL;
		}
		if (($id & 2) > 0 && isset($input['tmpFileName'])) {
			$object->tmpFileName = $input['tmpFileName'];
		} elseif (($id & 2) > 0 && array_key_exists('tmpFileName', $input) && $input['tmpFileName'] === NULL) {
			$object->tmpFileName = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\MQ\VO\Import to object
	 *
	 * @param Import $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\MQ\\VO\\Import' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Import)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\MQ\VO\Import.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['eshop'] = EshopMeta::toObject($object->eshop, $group);
		}
		if (($id & 2) > 0 && isset($object->eshop)) {
			$output['eshop'] = EshopMeta::toObject($object->eshop, $group);
		}

		if (($id & 1) > 0) {
			$output['feed'] = FeedMeta::toObject($object->feed, $group);
		}
		if (($id & 2) > 0 && isset($object->feed)) {
			$output['feed'] = FeedMeta::toObject($object->feed, $group);
		}

		if (($id & 1) > 0) {
			$output['tmpFileName'] = $object->tmpFileName;
		}
		if (($id & 2) > 0 && isset($object->tmpFileName)) {
			$output['tmpFileName'] = $object->tmpFileName;
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\MQ\VO\Import from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Import $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Import
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
	 * Serializes \CC15\MQ\VO\Import to JSON string
	 *
	 * @param Import $object
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
	 * Serializes \CC15\MQ\VO\Import to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Import $object
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
	 * Serializes \CC15\MQ\VO\Import to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Import $object
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
