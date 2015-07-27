<?php
namespace CC15\MQ\Consumer;

use Bunny\Channel;
use Bunny\Message;
use CC15\MQ\Producer\ImportProducer;
use CC15\MQ\VO\Import;
use Psr\Log\LoggerInterface;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\BunnyBundle\Annotation\Consumer;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Consumer(
 *     queue="feed_download",
 *     meta="CC15\MQ\VO\Meta\ImportMeta",
 *     setUpMethod="setUp",
 *     tickMethod="tick",
 *     tickSeconds=1.0
 * )
 */
class DownloadConsumer
{

	/**
	 * @var LoggerInterface
	 *
	 * @Autowired
	 */
	public $log;

	/**
	 * @var ImportProducer
	 *
	 * @Autowired
	 */
	public $importProducer;

	/**
	 * @var Channel
	 *
	 * @Autowired
	 */
	public $channel;

	/** @var resource */
	private $mh;

	/** @var resource[] */
	private $chsByFeedId = [];

	/** @var Import[] */
	private $importsByFeedId = [];

	/** @var Message[][] */
	private $messagesByFeedId = [];

	/** @var string[] */
	private $feedIdByCh = [];

	public function setUp()
	{
		$this->mh = curl_multi_init();
	}

	public function handleMessage(Import $import, Message $message)
	{
		$feedId = (string)$import->getFeed()->getId();

		if (!isset($this->messagesByFeedId[$feedId])) {
			$this->messagesByFeedId[$feedId] = [];

			$this->importsByFeedId[$feedId] = $import;
			$import->setTmpFileName($tmpFileName = tempnam(sys_get_temp_dir(), "FEED_" . $import->getEshop()->getSlug() . "_"));
			$this->chsByFeedId[$feedId] = $ch = curl_init();
			$this->feedIdByCh[(string)$ch] = $feedId;

			curl_setopt($ch, CURLOPT_URL, $import->getFeed()->getUrl());
			curl_setopt($ch, CURLOPT_TIMEOUT, 180);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_FILE, fopen($tmpFileName, "w"));
			curl_multi_add_handle($this->mh, $ch);
		}

		$this->messagesByFeedId[$feedId][] = $message;
	}

	public function tick()
	{
		$tickStart = microtime(true);
		if (curl_multi_exec($this->mh, $active) === CURLM_OK && $active > 0) {
			while (curl_multi_select($this->mh) > 0) {
				if (microtime(true) - $tickStart >= 4.0) {
					break;
				}

				do {
					$mrc = curl_multi_exec($this->mh, $active);
				} while ($mrc === CURLM_CALL_MULTI_PERFORM);
			}
		}

		$this->log->info("{$active} active downloads.");

		do {
			$info = curl_multi_info_read($this->mh, $waiting);

			if ($info !== false && $info["msg"] === CURLMSG_DONE) {
				$ch = $info["handle"];
				curl_multi_remove_handle($this->mh, $ch);

				$feedId = $this->feedIdByCh[(string)$ch];
				$import = $this->importsByFeedId[$feedId];
				$slug = $import->getEshop()->getSlug();
				$result = $info["result"];
				$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

				if ($result === CURLE_OK && $statusCode === 200) {
					$this->importProducer->publish($import);

				} else {
					unlink($import->getTmpFileName());

					if ($statusCode !== 200) {
						$this->log->error("Downloading feed {$feedId} ({$slug}) returned status code: {$statusCode}.");
					} else {
						$this->log->error("Downloading feed {$feedId} ({$slug}) failed with error {$result}: " . curl_strerror($result) . ".");
					}
				}

				foreach ($this->messagesByFeedId[$feedId] as $message) {
					$this->channel->ack($message);
				}

				unset($this->feedIdByCh[(string)$ch]);
				unset($this->chsByFeedId[$feedId]);
				unset($this->importsByFeedId[$feedId]);
				unset($this->messagesByFeedId[$feedId]);
			}

		} while ($waiting > 0);
	}

}
