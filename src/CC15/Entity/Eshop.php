<?php
namespace CC15\Entity;

use Skrz\Meta\PHP\PhpArrayOffset;

class Eshop
{

	/**
	 * @var \MongoId
	 *
	 * @PhpArrayOffset("_id", ignoreNull=true)
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $slug;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var Feed[]
	 */
	protected $feeds = [];

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
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param string $slug
	 * @return self
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;
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
	 * @return Feed[]
	 */
	public function getFeeds()
	{
		return $this->feeds;
	}

	/**
	 * @param Feed[] $feeds
	 * @return self
	 */
	public function setFeeds($feeds)
	{
		$this->feeds = $feeds;
		return $this;
	}

}
