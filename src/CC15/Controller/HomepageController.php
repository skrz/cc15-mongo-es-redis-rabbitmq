<?php
namespace CC15\Controller;

use CC15\Repository\EshopRepository;
use CC15\Repository\ProductRepository;
use CC15\Service\ListingService;
use CC15\Service\VO\ListingFilter;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Controller;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Controller
 */
class HomepageController extends BaseController
{

	/**
	 * @var EshopRepository
	 *
	 * @Autowired
	 */
	public $eshopRepository;

	/**
	 * @var ListingService
	 *
	 * @Autowired
	 */
	public $listingService;

	public function homepageAction()
	{
		return $this->render("CC15Bundle:Homepage:homepage.html.twig", [
			"eshops" => $this->eshopRepository->findEshopsForHomepage(),
			"products" => $this->listingService->findProducts(ListingFilter::create()),
		]);
	}

}
