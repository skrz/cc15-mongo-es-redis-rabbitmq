<?php
namespace CC15\Entity\Meta;

use CC15\Entity\Feed;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \CC15\Entity\Feed
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class FeedMeta extends Feed implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'CC15\Entity\Feed';
	const SHORT_NAME = 'Feed';
	const ENTITY_NAME = 'feed';
	const ID = 'id';
	const URL = 'url';
	const LAST_DOWNLOAD_STARTED_AT = 'lastDownloadStartedAt';
	const LAST_DOWNLOAD_ENDED_AT = 'lastDownloadEndedAt';
	const LAST_IMPORT_STARTED_AT = 'lastImportStartedAt';
	const LAST_IMPORT_ENDED_AT = 'lastImportEndedAt';


	/** @var FeedMeta */
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
	 * @return FeedMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \CC15\Entity\Feed
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Feed
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new Feed();
			case 1:
				return new Feed(func_get_arg(0));
			case 2:
				return new Feed(func_get_arg(0), func_get_arg(1));
			case 3:
				return new Feed(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new Feed(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new Feed(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new Feed(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new Feed(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new Feed(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \CC15\Entity\Feed to default values
	 *
	 *
	 * @param Feed $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof Feed)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Feed.');
		}
		$object->id = NULL;
		$object->url = NULL;
		$object->lastDownloadStartedAt = NULL;
		$object->lastDownloadEndedAt = NULL;
		$object->lastImportStartedAt = NULL;
		$object->lastImportEndedAt = NULL;
	}


	/**
	 * Creates \CC15\Entity\Feed object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param Feed $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Feed
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Feed' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Feed();
		} elseif (!($object instanceof Feed)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Feed.');
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

		if (($id & 1) > 0 && isset($input['lastDownloadStartedAt'])) {
			$object->lastDownloadStartedAt = $input['lastDownloadStartedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastDownloadStartedAt', $input) && $input['lastDownloadStartedAt'] === NULL) {
			$object->lastDownloadStartedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastDownloadStartedAt'])) {
			if ($input['lastDownloadStartedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastDownloadStartedAt'];
			} elseif (is_numeric($input['lastDownloadStartedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastDownloadStartedAt']));
			} elseif (is_string($input['lastDownloadStartedAt'])) {
				if ($input['lastDownloadStartedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastDownloadStartedAt']);
				}
			} elseif (is_array($input['lastDownloadStartedAt']) && isset($input['lastDownloadStartedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastDownloadStartedAt']['date']);
			} elseif ($input['lastDownloadStartedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastDownloadStartedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastDownloadStartedAt', $input) && $input['lastDownloadStartedAt'] === NULL) {
			$object->lastDownloadStartedAt = NULL;
		}

		if (($id & 1) > 0 && isset($input['lastDownloadEndedAt'])) {
			$object->lastDownloadEndedAt = $input['lastDownloadEndedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastDownloadEndedAt', $input) && $input['lastDownloadEndedAt'] === NULL) {
			$object->lastDownloadEndedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastDownloadEndedAt'])) {
			if ($input['lastDownloadEndedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastDownloadEndedAt'];
			} elseif (is_numeric($input['lastDownloadEndedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastDownloadEndedAt']));
			} elseif (is_string($input['lastDownloadEndedAt'])) {
				if ($input['lastDownloadEndedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastDownloadEndedAt']);
				}
			} elseif (is_array($input['lastDownloadEndedAt']) && isset($input['lastDownloadEndedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastDownloadEndedAt']['date']);
			} elseif ($input['lastDownloadEndedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastDownloadEndedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastDownloadEndedAt', $input) && $input['lastDownloadEndedAt'] === NULL) {
			$object->lastDownloadEndedAt = NULL;
		}

		if (($id & 1) > 0 && isset($input['lastImportStartedAt'])) {
			$object->lastImportStartedAt = $input['lastImportStartedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastImportStartedAt', $input) && $input['lastImportStartedAt'] === NULL) {
			$object->lastImportStartedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastImportStartedAt'])) {
			if ($input['lastImportStartedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastImportStartedAt'];
			} elseif (is_numeric($input['lastImportStartedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastImportStartedAt']));
			} elseif (is_string($input['lastImportStartedAt'])) {
				if ($input['lastImportStartedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastImportStartedAt']);
				}
			} elseif (is_array($input['lastImportStartedAt']) && isset($input['lastImportStartedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastImportStartedAt']['date']);
			} elseif ($input['lastImportStartedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastImportStartedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastImportStartedAt', $input) && $input['lastImportStartedAt'] === NULL) {
			$object->lastImportStartedAt = NULL;
		}

		if (($id & 1) > 0 && isset($input['lastImportEndedAt'])) {
			$object->lastImportEndedAt = $input['lastImportEndedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastImportEndedAt', $input) && $input['lastImportEndedAt'] === NULL) {
			$object->lastImportEndedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastImportEndedAt'])) {
			if ($input['lastImportEndedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastImportEndedAt'];
			} elseif (is_numeric($input['lastImportEndedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastImportEndedAt']));
			} elseif (is_string($input['lastImportEndedAt'])) {
				if ($input['lastImportEndedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastImportEndedAt']);
				}
			} elseif (is_array($input['lastImportEndedAt']) && isset($input['lastImportEndedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastImportEndedAt']['date']);
			} elseif ($input['lastImportEndedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastImportEndedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastImportEndedAt', $input) && $input['lastImportEndedAt'] === NULL) {
			$object->lastImportEndedAt = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Feed to array
	 *
	 * @param Feed $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Feed' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Feed)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Feed.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			$output['lastDownloadStartedAt'] = $object->lastDownloadStartedAt;
		}
		if (($id & 2) > 0 && isset($object->lastDownloadStartedAt)) {
			if ($object->lastDownloadStartedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastDownloadStartedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastDownloadStartedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastDownloadStartedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastDownloadStartedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastDownloadStartedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadStartedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastDownloadStartedAt) && isset($object->lastDownloadStartedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadStartedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastDownloadStartedAt'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['lastDownloadEndedAt'] = $object->lastDownloadEndedAt;
		}
		if (($id & 2) > 0 && isset($object->lastDownloadEndedAt)) {
			if ($object->lastDownloadEndedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastDownloadEndedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastDownloadEndedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastDownloadEndedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastDownloadEndedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastDownloadEndedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadEndedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastDownloadEndedAt) && isset($object->lastDownloadEndedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadEndedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastDownloadEndedAt'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['lastImportStartedAt'] = $object->lastImportStartedAt;
		}
		if (($id & 2) > 0 && isset($object->lastImportStartedAt)) {
			if ($object->lastImportStartedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastImportStartedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastImportStartedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastImportStartedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastImportStartedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastImportStartedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastImportStartedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastImportStartedAt) && isset($object->lastImportStartedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastImportStartedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastImportStartedAt'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['lastImportEndedAt'] = $object->lastImportEndedAt;
		}
		if (($id & 2) > 0 && isset($object->lastImportEndedAt)) {
			if ($object->lastImportEndedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastImportEndedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastImportEndedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastImportEndedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastImportEndedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastImportEndedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastImportEndedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastImportEndedAt) && isset($object->lastImportEndedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastImportEndedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastImportEndedAt'] = $datetimeStringReturn;
		}

		return $output;
	}


	/**
	 * Creates \CC15\Entity\Feed object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param Feed $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Feed
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Feed' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new Feed();
		} elseif (!($object instanceof Feed)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Feed.');
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

		if (($id & 1) > 0 && isset($input['lastDownloadStartedAt'])) {
			$object->lastDownloadStartedAt = $input['lastDownloadStartedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastDownloadStartedAt', $input) && $input['lastDownloadStartedAt'] === NULL) {
			$object->lastDownloadStartedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastDownloadStartedAt'])) {
			if ($input['lastDownloadStartedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastDownloadStartedAt'];
			} elseif (is_numeric($input['lastDownloadStartedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastDownloadStartedAt']));
			} elseif (is_string($input['lastDownloadStartedAt'])) {
				if ($input['lastDownloadStartedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastDownloadStartedAt']);
				}
			} elseif (is_array($input['lastDownloadStartedAt']) && isset($input['lastDownloadStartedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastDownloadStartedAt']['date']);
			} elseif ($input['lastDownloadStartedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastDownloadStartedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastDownloadStartedAt', $input) && $input['lastDownloadStartedAt'] === NULL) {
			$object->lastDownloadStartedAt = NULL;
		}

		if (($id & 1) > 0 && isset($input['lastDownloadEndedAt'])) {
			$object->lastDownloadEndedAt = $input['lastDownloadEndedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastDownloadEndedAt', $input) && $input['lastDownloadEndedAt'] === NULL) {
			$object->lastDownloadEndedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastDownloadEndedAt'])) {
			if ($input['lastDownloadEndedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastDownloadEndedAt'];
			} elseif (is_numeric($input['lastDownloadEndedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastDownloadEndedAt']));
			} elseif (is_string($input['lastDownloadEndedAt'])) {
				if ($input['lastDownloadEndedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastDownloadEndedAt']);
				}
			} elseif (is_array($input['lastDownloadEndedAt']) && isset($input['lastDownloadEndedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastDownloadEndedAt']['date']);
			} elseif ($input['lastDownloadEndedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastDownloadEndedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastDownloadEndedAt', $input) && $input['lastDownloadEndedAt'] === NULL) {
			$object->lastDownloadEndedAt = NULL;
		}

		if (($id & 1) > 0 && isset($input['lastImportStartedAt'])) {
			$object->lastImportStartedAt = $input['lastImportStartedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastImportStartedAt', $input) && $input['lastImportStartedAt'] === NULL) {
			$object->lastImportStartedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastImportStartedAt'])) {
			if ($input['lastImportStartedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastImportStartedAt'];
			} elseif (is_numeric($input['lastImportStartedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastImportStartedAt']));
			} elseif (is_string($input['lastImportStartedAt'])) {
				if ($input['lastImportStartedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastImportStartedAt']);
				}
			} elseif (is_array($input['lastImportStartedAt']) && isset($input['lastImportStartedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastImportStartedAt']['date']);
			} elseif ($input['lastImportStartedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastImportStartedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastImportStartedAt', $input) && $input['lastImportStartedAt'] === NULL) {
			$object->lastImportStartedAt = NULL;
		}

		if (($id & 1) > 0 && isset($input['lastImportEndedAt'])) {
			$object->lastImportEndedAt = $input['lastImportEndedAt'];
		} elseif (($id & 1) > 0 && array_key_exists('lastImportEndedAt', $input) && $input['lastImportEndedAt'] === NULL) {
			$object->lastImportEndedAt = NULL;
		}
		if (($id & 2) > 0 && isset($input['lastImportEndedAt'])) {
			if ($input['lastImportEndedAt'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['lastImportEndedAt'];
			} elseif (is_numeric($input['lastImportEndedAt'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['lastImportEndedAt']));
			} elseif (is_string($input['lastImportEndedAt'])) {
				if ($input['lastImportEndedAt'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d\\TH:i:sO', $input['lastImportEndedAt']);
				}
			} elseif (is_array($input['lastImportEndedAt']) && isset($input['lastImportEndedAt']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['lastImportEndedAt']['date']);
			} elseif ($input['lastImportEndedAt'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$object->lastImportEndedAt = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('lastImportEndedAt', $input) && $input['lastImportEndedAt'] === NULL) {
			$object->lastImportEndedAt = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \CC15\Entity\Feed to object
	 *
	 * @param Feed $object
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
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'CC15\\Entity\\Feed' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof Feed)) {
			throw new \InvalidArgumentException('You have to pass object of class CC15\Entity\Feed.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['_id'] = $object->id;
		}
		if (($id & 2) > 0 && isset($object->id)) {
			$output['id'] = (string)$object->id;
		}

		if (($id & 1) > 0) {
			$output['url'] = $object->url;
		}
		if (($id & 2) > 0 && isset($object->url)) {
			$output['url'] = $object->url;
		}

		if (($id & 1) > 0) {
			$output['lastDownloadStartedAt'] = $object->lastDownloadStartedAt;
		}
		if (($id & 2) > 0 && isset($object->lastDownloadStartedAt)) {
			if ($object->lastDownloadStartedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastDownloadStartedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastDownloadStartedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastDownloadStartedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastDownloadStartedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastDownloadStartedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadStartedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastDownloadStartedAt) && isset($object->lastDownloadStartedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadStartedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastDownloadStartedAt'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['lastDownloadEndedAt'] = $object->lastDownloadEndedAt;
		}
		if (($id & 2) > 0 && isset($object->lastDownloadEndedAt)) {
			if ($object->lastDownloadEndedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastDownloadEndedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastDownloadEndedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastDownloadEndedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastDownloadEndedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastDownloadEndedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadEndedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastDownloadEndedAt) && isset($object->lastDownloadEndedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastDownloadEndedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastDownloadEndedAt'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['lastImportStartedAt'] = $object->lastImportStartedAt;
		}
		if (($id & 2) > 0 && isset($object->lastImportStartedAt)) {
			if ($object->lastImportStartedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastImportStartedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastImportStartedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastImportStartedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastImportStartedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastImportStartedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastImportStartedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastImportStartedAt) && isset($object->lastImportStartedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastImportStartedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastImportStartedAt'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['lastImportEndedAt'] = $object->lastImportEndedAt;
		}
		if (($id & 2) > 0 && isset($object->lastImportEndedAt)) {
			if ($object->lastImportEndedAt === null) {
				$datetimeStringReturn = null;
			} elseif ($object->lastImportEndedAt instanceof \DateTime) {
				$datetimeStringReturn = $object->lastImportEndedAt->format('Y-m-d\\TH:i:sO');
			} elseif (is_numeric($object->lastImportEndedAt)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->lastImportEndedAt)))->format('Y-m-d\\TH:i:sO');
			} elseif (is_string($object->lastImportEndedAt)) {
				$datetimeStringReturn = (new \DateTime($object->lastImportEndedAt))->format('Y-m-d\\TH:i:sO');
			} elseif (is_array($object->lastImportEndedAt) && isset($object->lastImportEndedAt['date'])) {
				$datetimeStringReturn = (new \DateTime($object->lastImportEndedAt['date']))->format('Y-m-d\\TH:i:sO');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d\\TH:i:sO' . '.');
			}
			$output['lastImportEndedAt'] = $datetimeStringReturn;
		}

		return (object)$output;
	}


	/**
	 * Creates \CC15\Entity\Feed from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param Feed $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return Feed
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
	 * Serializes \CC15\Entity\Feed to JSON string
	 *
	 * @param Feed $object
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
	 * Serializes \CC15\Entity\Feed to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param Feed $object
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
	 * Serializes \CC15\Entity\Feed to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param Feed $object
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
