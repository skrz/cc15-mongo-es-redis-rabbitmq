<?php
namespace CC15\Entity;

use Skrz\Meta\PHP\PhpArrayOffset;

class Product
{

	/**
	 * @var \MongoId
	 *
	 * @PhpArrayOffset("_id", ignoreNull=true)
	 */
	protected $id;

	/**
	 * @var int
	 */
	protected $v = 1;

	/**
	 * @var \MongoId
	 */
	protected $eshopId;

	/**
	 * @var Eshop
	 */
	protected $eshop;

	/**
	 * @var string
	 */
	protected $itemGroupId;

	/**
	 * @var string
	 */
	protected $itemId;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $longName;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var int
	 */
	protected $deliveryDate;

	/**
	 * @var Image[]
	 */
	protected $images = [];

	/**
	 * @var string
	 */
	protected $ean;

	/**
	 * @var string
	 */
	protected $isbn;

	/**
	 * @var string
	 */
	protected $productno;

	/**
	 * @var string
	 */
	protected $manufacturer;

	/**
	 * @var string
	 */
	protected $brand;

	/**
	 * @var string[]
	 */
	protected $categoryTexts = [];

	/**
	 * @var \MongoId[]
	 */
	protected $categoryIds = [];

	/**
	 * @var Category[]
	 */
	protected $categories;

	/**
	 * @var string
	 *
	 * @see \CC15\Entity\ProductItemTypeEnum
	 */
	protected $itemType = ProductItemTypeEnum::ITEM_NEW;

	/**
	 * @var string[]
	 *
	 * @see \CC15\Entity\ProductExtraMessageEnum
	 */
	protected $extraMessages = [];

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
	 * @return int
	 */
	public function getV()
	{
		return $this->v;
	}

	/**
	 * @param int $v
	 * @return self
	 */
	public function setV($v)
	{
		$this->v = $v;
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
	public function setEshop(Eshop $eshop)
	{
		$this->eshop = $eshop;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getItemGroupId()
	{
		return $this->itemGroupId;
	}

	/**
	 * @param string $itemGroupId
	 * @return self
	 */
	public function setItemGroupId($itemGroupId)
	{
		$this->itemGroupId = $itemGroupId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getItemId()
	{
		return $this->itemId;
	}

	/**
	 * @param string $itemId
	 * @return self
	 */
	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
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
	 * @return string
	 */
	public function getLongName()
	{
		return $this->longName;
	}

	/**
	 * @param string $longName
	 * @return self
	 */
	public function setLongName($longName)
	{
		$this->longName = $longName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return self
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 * @return self
	 */
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param float $price
	 * @return self
	 */
	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDeliveryDate()
	{
		return $this->deliveryDate;
	}

	/**
	 * @param int $deliveryDate
	 * @return self
	 */
	public function setDeliveryDate($deliveryDate)
	{
		$this->deliveryDate = $deliveryDate;
		return $this;
	}

	/**
	 * @return Image[]
	 */
	public function getImages()
	{
		return $this->images;
	}

	/**
	 * @param Image[] $images
	 * @return self
	 */
	public function setImages($images)
	{
		$this->images = $images;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEan()
	{
		return $this->ean;
	}

	/**
	 * @param string $ean
	 * @return self
	 */
	public function setEan($ean)
	{
		$this->ean = $ean;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getIsbn()
	{
		return $this->isbn;
	}

	/**
	 * @param string $isbn
	 * @return self
	 */
	public function setIsbn($isbn)
	{
		$this->isbn = $isbn;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getProductno()
	{
		return $this->productno;
	}

	/**
	 * @param string $productno
	 * @return self
	 */
	public function setProductno($productno)
	{
		$this->productno = $productno;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getManufacturer()
	{
		return $this->manufacturer;
	}

	/**
	 * @param string $manufacturer
	 * @return self
	 */
	public function setManufacturer($manufacturer)
	{
		$this->manufacturer = $manufacturer;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBrand()
	{
		return $this->brand;
	}

	/**
	 * @param string $brand
	 * @return self
	 */
	public function setBrand($brand)
	{
		$this->brand = $brand;
		return $this;
	}

	/**
	 * @return \string[]
	 */
	public function getCategoryTexts()
	{
		return $this->categoryTexts;
	}

	/**
	 * @param \string[] $categoryTexts
	 * @return self
	 */
	public function setCategoryTexts($categoryTexts)
	{
		$this->categoryTexts = $categoryTexts;
		return $this;
	}

	/**
	 * @return \MongoId[]
	 */
	public function getCategoryIds()
	{
		return $this->categoryIds;
	}

	/**
	 * @param \MongoId[] $categoryIds
	 * @return self
	 */
	public function setCategoryIds($categoryIds)
	{
		$this->categoryIds = $categoryIds;
		return $this;
	}

	/**
	 * @return Category[]
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @param Category[] $categories
	 * @return self
	 */
	public function setCategories($categories)
	{
		$this->categories = $categories;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getItemType()
	{
		return $this->itemType;
	}

	/**
	 * @param string $itemType
	 * @return self
	 */
	public function setItemType($itemType)
	{
		$this->itemType = $itemType;
		return $this;
	}

	/**
	 * @return \string[]
	 */
	public function getExtraMessages()
	{
		return $this->extraMessages;
	}

	/**
	 * @param \string[] $extraMessages
	 * @return self
	 */
	public function setExtraMessages($extraMessages)
	{
		$this->extraMessages = $extraMessages;
		return $this;
	}

	/**
	 * @return Image
	 */
	public function getFirstImage()
	{
		if (isset($this->getImages()[0])) {
			return $this->getImages()[0];
		}

		return null;
	}

	/**
	 * @param Image $image
	 * @return self
	 */
	public function addImage(Image $image)
	{
		$this->images = (array)$this->images;
		$this->images[] = $image;
		return $this;
	}

	/**
	 * @param string $categoryText
	 * @return self
	 */
	public function addCategoryText($categoryText)
	{
		$this->categoryTexts = (array)$this->categoryTexts;
		$this->categoryTexts[] = $categoryText;
		return $this;
	}

	/**
	 * @param string $extraMessage
	 * @return self
	 */
	public function addExtraMessage($extraMessage)
	{
		$this->extraMessages = (array)$this->extraMessages;
		$this->extraMessages[] = $extraMessage;
		return $this;
	}

}
