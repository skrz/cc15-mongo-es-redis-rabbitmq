<?php
namespace CC15\Repository;

use CC15\Entity\Category;
use CC15\Entity\Eshop;
use CC15\Entity\Meta\ProductMeta;
use CC15\Entity\Product;
use Skrz\Bundle\AutowiringBundle\Annotation\Repository;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Repository
 */
class ProductRepository extends AbstractMongoRepository
{

	protected function createMeta()
	{
		return ProductMeta::getInstance();
	}

	/**
	 * @param Product $product
	 * @return Product
	 */
	public function findOneFromEshop(Product $product)
	{
		return $this->findOne([
			ProductMeta::ESHOP_ID => $product->getEshopId(),
			ProductMeta::ITEM_GROUP_ID => $product->getItemGroupId(),
			ProductMeta::ITEM_ID => $product->getItemId(),
		]);
	}

}
