<?php
namespace CC15\MQ\VO;

use CC15\Entity\Category;
use CC15\Entity\Product;

class Change
{

	/**
	 * @var Product
	 */
	protected $product;

	/**
	 * @var Category
	 */
	protected $category;

	public static function create()
	{
		return new Change();
	}

	/**
	 * @return Product
	 */
	public function getProduct()
	{
		return $this->product;
	}

	/**
	 * @param Product $product
	 * @return self
	 */
	public function setProduct(Product $product)
	{
		$this->product = $product;
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
	public function setCategory(Category $category)
	{
		$this->category = $category;
		return $this;
	}

}
