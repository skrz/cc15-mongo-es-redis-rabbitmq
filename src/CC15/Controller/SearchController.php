<?php
namespace CC15\Controller;

use CC15\Service\ListingService;
use CC15\Service\VO\ListingFilter;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Controller
 */
class SearchController extends BaseController
{

	/**
	 * @var ListingService
	 *
	 * @Autowired
	 */
	public $listingService;

	public function searchAction(Request $request)
	{
		$q = $request->query->get("q");

		return $this->render("CC15Bundle:Search:search.html.twig", [
			"q" => $q,
			"products" => $this->listingService->findProducts(
				ListingFilter::create()
					->setQ($q)
			)
		]);
	}

}
