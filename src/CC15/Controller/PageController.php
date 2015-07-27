<?php
namespace CC15\Controller;

use CC15\Service\RedisService;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Controller
 */
class PageController extends BaseController
{

	/**
	 * @var RequestStack
	 *
	 * @Autowired
	 */
	public $requestStack;

	/**
	 * @var RedisService
	 *
	 * @Autowired
	 */
	public $redisService;

	/**
	 * @var UsersOnlineSubscriber
	 *
	 * @Autowired
	 */
	public $usersOnlineSubscriber;

	public function pageUsersOnlineAction(Request $request)
	{
		return $this->render("CC15Bundle:Page:pageUsersOnline.html.twig", [
			"online" => $this->redisService->countUsersOnline(
				$this->usersOnlineSubscriber->createPageKey($this->requestStack->getMasterRequest())
			),
		]);
	}

}
