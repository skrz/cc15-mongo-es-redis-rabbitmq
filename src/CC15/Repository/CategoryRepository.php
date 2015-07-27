<?php
namespace CC15\Repository;

use CC15\Entity\Category;
use CC15\Entity\Eshop;
use CC15\Entity\Meta\CategoryMeta;
use Skrz\Bundle\AutowiringBundle\Annotation\Repository;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Repository
 */
class CategoryRepository extends AbstractMongoRepository
{

	protected function createMeta()
	{
		return CategoryMeta::getInstance();
	}

	/**
	 * @param Eshop $eshop
	 * @param Category $category
	 * @return Category[]
	 */
	public function findCategories(Eshop $eshop, Category $category = null)
	{
		$query = ['$and' => [
			[CategoryMeta::ESHOP_ID => $eshop->getId()]
		]];

		if ($category === null) {
			$query['$and'][] = [CategoryMeta::PATH => ['$size' => 0]];
		} else {
			$query['$and'][] = [CategoryMeta::PATH => $category->getId()];
			$query['$and'][] = [CategoryMeta::PATH => ['$size' => count($category->getPath()) + 1]];
		}

		return $this->find($query, [], ["sort" => [CategoryMeta::NAME => 1]]);
	}

}
