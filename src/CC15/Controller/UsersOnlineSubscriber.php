<?php
namespace CC15\Controller;

use CC15\Service\RedisService;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Component;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Component
 */
class UsersOnlineSubscriber implements EventSubscriberInterface
{

	const USER_IDENT_COOKIE = "userIdent";

	/**
	 * @var RedisService
	 *
	 * @Autowired
	 */
	public $redisService;

	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::REQUEST => "onKernelRequest",
			KernelEvents::RESPONSE => "onKernelResponse",
		];
	}

	public function onKernelRequest(GetResponseEvent $ev)
	{
		if (!$ev->isMasterRequest()) {
			return;
		}

		$request = $ev->getRequest();

		if (!$request->cookies->has(self::USER_IDENT_COOKIE)) {
			$request->cookies->set(self::USER_IDENT_COOKIE, sha1($request->getClientIp() . time() . uniqid("", true)));
		}

		$this->redisService->markUserOnline(
			$this->createPageKey($request),
			$request->cookies->get(self::USER_IDENT_COOKIE)
		);
	}

	public function onKernelResponse(FilterResponseEvent $ev)
	{
		if (!$ev->isMasterRequest()) {
			return;
		}

		$request = $ev->getRequest();

		if ($request->cookies->has(self::USER_IDENT_COOKIE)) {
			$ev->getResponse()->headers->setCookie(new Cookie(
				self::USER_IDENT_COOKIE,
				$request->cookies->get(self::USER_IDENT_COOKIE),
				time() + 365 * 24 * 3600
			));
		}
	}

	public function createPageKey(Request $request)
	{
		$pageKey = $request->getPathInfo();

		if (strncmp($request->attributes->get("_controller"), "controller.search", 17 /* strlen("controller.search") */) === 0) {
			$pageKey .= "?q=" . urlencode($request->query->get("q"));
		}

		return $pageKey;
	}

}
