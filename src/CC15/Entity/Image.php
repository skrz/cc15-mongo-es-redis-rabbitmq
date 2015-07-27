<?php
namespace CC15\Entity;

class Image
{

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var \MongoId
	 */
	protected $fileId;

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
	 * @return \MongoId
	 */
	public function getFileId()
	{
		return $this->fileId;
	}

	/**
	 * @param \MongoId $fileId
	 * @return self
	 */
	public function setFileId(\MongoId $fileId = null)
	{
		$this->fileId = $fileId;
		return $this;
	}

}
