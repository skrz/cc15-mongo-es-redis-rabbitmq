<?php
namespace CC15\Service;

use Predis\Client;
use Predis\Pipeline\Pipeline;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Service;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Service
 */
class RedisService
{

	const USERS_ONLINE_PREFIX = "users-online:";

	const ONLINE_MINUTES = 1;

	/**
	 * @var Client
	 *
	 * @Autowired
	 */
	public $redis;

	public function markUserOnline($pageKey, $userIdent)
	{
		$thisMinute = floor(time() / 60) * 60;
		$key = $this->makeUsersOnlineKey($pageKey, $thisMinute);
		$this->redis->pipeline(function (Pipeline $p) use ($key, $userIdent) {
			$p->sadd($key, $userIdent);
			$p->expire($key, self::ONLINE_MINUTES * 60);
		});
	}

	public function countUsersOnline($pageKey)
	{
		$keys = [];
		$thisMinute = floor(time() / 60) * 60;
		for ($i = $thisMinute - 60 * self::ONLINE_MINUTES; $i <= $thisMinute; $i += 60) {
			$keys[] = $this->makeUsersOnlineKey($pageKey, $i);
		}

		return $this->redis->sunionstore(self::USERS_ONLINE_PREFIX, $keys);
	}

	private function makeUsersOnlineKey($pageKey, $ts)
	{
		return self::USERS_ONLINE_PREFIX . $pageKey . ":" . $ts;
	}

}
