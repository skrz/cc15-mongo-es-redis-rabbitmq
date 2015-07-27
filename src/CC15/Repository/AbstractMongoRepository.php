<?php
namespace CC15\Repository;

use CC15\Repository\Exception\NotFoundException;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

abstract class AbstractMongoRepository
{

	/**
	 * @var \MongoDB
	 *
	 * @Autowired
	 */
	public $mongo;

	/**
	 * @var \MongoCollection
	 */
	protected $collection;

	/**
	 * @var MetaInterface|PhpMetaInterface
	 */
	protected $meta;

	public function getCollection()
	{
		if ($this->collection === null) {
			$this->collection = $this->createCollection();
		}

		return $this->collection;
	}

	protected function createCollection()
	{
		$meta = $this->getMeta();
		return $this->mongo->createCollection($meta::SHORT_NAME);
	}

	public function getMeta()
	{
		if ($this->meta === null) {
			$this->meta = $this->createMeta();
		}

		return $this->meta;
	}

	abstract protected function createMeta();

	public function find(array $query, array $fields = [], array $options = [])
	{
		$ret = [];

		$cursor = $this->getCollection()->find($query, $fields);

		if (isset($options["sort"])) {
			$cursor->sort($options["sort"]);
		}

		if (isset($options["skip"])) {
			$cursor->skip($options["skip"]);
		} elseif (isset($options["offset"])) {
			$cursor->skip($options["offset"]);
		}

		if (isset($options["limit"])) {
			$cursor->limit($options["limit"]);
		}

		$meta = $this->getMeta();
		foreach ($cursor as $doc) {
			$ret[] = $meta->fromArray($doc);
		}

		return $ret;
	}

	public function findOne(array $query, array $fields = [])
	{
		$doc = $this->getCollection()->findOne($query, $fields);

		if ($doc !== null) {
			$doc = $this->getMeta()->fromArray($doc);
		}

		return $doc;
	}

	public function getOne(array $query, array $fields = [])
	{
		$doc = $this->getCollection()->findOne($query, $fields);
		$meta = $this->getMeta();

		if ($doc !== null) {
			return $meta->fromArray($doc);
		} else {
			throw new NotFoundException(
				"Entity of type '" . $meta::CLASS_NAME . "' for query '" . json_encode($query) . "' not found."
			);
		}
	}

	public function insert($doc)
	{
		$docArray = $this->getMeta()->toArray($doc);
		$ret = $this->getCollection()->insert($docArray);

		if (isset($docArray["_id"])) {
			$doc->setId($docArray["_id"]);
		}

		return $ret;
	}

	public function save($doc)
	{
		$docArray = $this->getMeta()->toArray($doc);
		$ret = $this->getCollection()->save($docArray);

		if (isset($docArray["_id"])) {
			$doc->setId($docArray["_id"]);
		}

		return $ret;
	}

	public function update(array $query, array $updates, array $options = [])
	{
		return $this->getCollection()->update($query, $updates, $options);
	}

	public function findAndModify(array $query, array $updates, array $fields = [], array $options = [])
	{
		$doc = $this->getCollection()->findAndModify($query, $updates, $fields, $options);

		if ($doc !== null) {
			$doc = $this->getMeta()->fromArray($doc);
		}

		return $doc;
	}

	public function findOneById($id, $fields = [])
	{
		if (is_string($id)) {
			$id = new \MongoId($id);
		}

		return $this->findOne(["_id" => $id], $fields);
	}

	public function getOneById($id, $fields = [])
	{
		if (is_string($id)) {
			$id = new \MongoId($id);
		}

		return $this->getOne(["_id" => $id], $fields);
	}

	public function count(array $query)
	{
		return $this->getCollection()->count($query);
	}

}
