<?php
namespace CC15\Entity;

use Skrz\Meta\PHP\PhpArrayOffset;

class Feed
{

	/**
	 * @var \MongoId
	 *
	 * @PhpArrayOffset("_id")
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var \DateTime
	 */
	protected $lastDownloadStartedAt;

	/**
	 * @var \DateTime
	 */
	protected $lastDownloadEndedAt;

	/**
	 * @var \DateTime
	 */
	protected $lastImportStartedAt;

	/**
	 * @var \DateTime
	 */
	protected $lastImportEndedAt;

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
	 * @return \DateTime
	 */
	public function getLastDownloadStartedAt()
	{
		return $this->lastDownloadStartedAt;
	}

	/**
	 * @param \DateTime $lastDownloadStartedAt
	 * @return self
	 */
	public function setLastDownloadStartedAt(\DateTime $lastDownloadStartedAt)
	{
		$this->lastDownloadStartedAt = $lastDownloadStartedAt;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getLastDownloadEndedAt()
	{
		return $this->lastDownloadEndedAt;
	}

	/**
	 * @param \DateTime $lastDownloadEndedAt
	 * @return self
	 */
	public function setLastDownloadEndedAt(\DateTime $lastDownloadEndedAt)
	{
		$this->lastDownloadEndedAt = $lastDownloadEndedAt;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getLastImportStartedAt()
	{
		return $this->lastImportStartedAt;
	}

	/**
	 * @param \DateTime $lastImportStartedAt
	 * @return self
	 */
	public function setLastImportStartedAt(\DateTime $lastImportStartedAt)
	{
		$this->lastImportStartedAt = $lastImportStartedAt;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getLastImportEndedAt()
	{
		return $this->lastImportEndedAt;
	}

	/**
	 * @param \DateTime $lastImportEndedAt
	 * @return self
	 */
	public function setLastImportEndedAt(\DateTime $lastImportEndedAt)
	{
		$this->lastImportEndedAt = $lastImportEndedAt;
		return $this;
	}

}
