<?php
namespace CC15\Controller;

use CC15\Entity\Category;
use CC15\Entity\Eshop;
use CC15\Entity\Meta\EshopMeta;
use CC15\Repository\CategoryRepository;
use CC15\Repository\EshopRepository;
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
class EshopController extends BaseController
{

	/**
	 * @var EshopRepository
	 *
	 * @Autowired
	 */
	public $eshopRepository;

	/**
	 * @var CategoryRepository
	 *
	 * @Autowired
	 */
	public $categoryRepository;

	/**
	 * @var ListingService
	 *
	 * @Autowired
	 */
	public $listingService;

	public function eshopDetailAction(Request $request)
	{
		/** @var Eshop $eshop */
		$eshop = $this->eshopRepository->findOne([EshopMeta::SLUG => $request->attributes->get("eshop")]);
		$category = null;
		if ($request->attributes->has("category")) {
			/** @var Category $category */
			$category = $this->categoryRepository->findOneById($request->attributes->get("category"));
		}

		return $this->render("CC15Bundle:Eshop:eshopDetail.html.twig", [
			"eshop" => $eshop,
			"category" => $category,
			"categories" => $this->categoryRepository->findCategories($eshop, $category),
			"products" => $this->listingService->findProducts(
				ListingFilter::create()
					->setEshop($eshop)
					->setCategory($category)
			),
		]);
	}

}
