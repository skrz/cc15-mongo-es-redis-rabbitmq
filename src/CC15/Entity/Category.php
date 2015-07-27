<?php
namespace CC15\Entity;

use Skrz\Meta\PHP\PhpArrayOffset;

class Category
{

	/**
	 * @var \MongoId
	 *
	 * @PhpArrayOffset("_id", ignoreNull=true)
	 */
	protected $id;

	/**
	 * @var \MongoId
	 */
	protected $eshopId;

	/**
	 * @var string
	 */
	protected $hash;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var \MongoId[]
	 */
	protected $path = [];

	/**
	 * @return \MongoId
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param \MongoId $id
	 * @return self
	 */
	public function setId(\MongoId $id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return \MongoId
	 */
	public function getEshopId()
	{
		return $this->eshopId;
	}

	/**
	 * @param \MongoId $eshopId
	 * @return self
	 */
	public function setEshopId(\MongoId $eshopId)
	{
		$this->eshopId = $eshopId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHash()
	{
		return $this->hash;
	}

	/**
	 * @param string $hash
	 * @return self
	 */
	public function setHash($hash)
	{
		$this->hash = $hash;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return self
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return \MongoId[]
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param \MongoId[] $path
	 * @return self
	 */
	public function setPath($path)
	{
		$this->path = $path;
		return $this;
	}

}
