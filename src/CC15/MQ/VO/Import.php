<?php
namespace CC15\MQ\VO;

use CC15\Entity\Eshop;
use CC15\Entity\Feed;

class Import
{

	/**
	 * @var Eshop
	 */
	protected $eshop;

	/**
	 * @var Feed
	 */
	protected $feed;

	/**
	 * @var string
	 */
	protected $tmpFileName;

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
	 * @return Feed
	 */
	public function getFeed()
	{
		return $this->feed;
	}

	/**
	 * @param Feed $feed
	 * @return self
	 */
	public function setFeed(Feed $feed)
	{
		$this->feed = $feed;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTmpFileName()
	{
		return $this->tmpFileName;
	}

	/**
	 * @param string $tmpFileName
	 * @return self
	 */
	public function setTmpFileName($tmpFileName)
	{
		$this->tmpFileName = $tmpFileName;
		return $this;
	}

}
