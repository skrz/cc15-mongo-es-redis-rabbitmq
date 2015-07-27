<?php
namespace CC15\Service\VO;

use CC15\Entity\Category;
use CC15\Entity\Eshop;

class ListingFilter
{

	/** @var Eshop */
	private $eshop;

	/** @var Category */
	private $category;

	/** @var string */
	private $q;

	/** @var int */
	private $limit = 10;

	/** @var int */
	private $offset = 0;

	public static function create()
	{
		return new static();
	}

	/**
	 * @return Eshop
	 */
	public function getEshop()
	{
		return $this->eshop;
	}

	/**
	 * @param Eshop $eshop
	 * @return self
	 */
	public function setEshop(Eshop $eshop = null)
	{
		$this->eshop = $eshop;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * @param Category $category
	 * @return self
	 */
	public function setCategory(Category $category = null)
	{
		$this->category = $category;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getQ()
	{
		return $this->q;
	}

	/**
	 * @param string $q
	 * @return self
	 */
	public function setQ($q)
	{
		$this->q = $q;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLimit()
	{
		return $this->limit;
	}

	/**
	 * @param int $limit
	 * @return self
	 */
	public function setLimit($limit)
	{
		$this->limit = $limit;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getOffset()
	{
		return $this->offset;
	}

	/**
	 * @param int $offset
	 * @return self
	 */
	public function setOffset($offset)
	{
		$this->offset = $offset;
		return $this;
	}

}
