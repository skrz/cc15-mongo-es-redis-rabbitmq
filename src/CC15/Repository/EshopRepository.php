<?php
namespace CC15\Repository;

use CC15\Entity\Eshop;
use CC15\Entity\Meta\EshopMeta;
use Skrz\Bundle\AutowiringBundle\Annotation\Repository;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Repository
 */
class EshopRepository extends AbstractMongoRepository
{

	protected function createMeta()
	{
		return EshopMeta::getInstance();
	}

	/**
	 * @return Eshop[]
	 */
	public function findEshopsForHomepage()
	{
		return $this->find([], [], ["sort" => [EshopMeta::NAME => 1]]);
	}

}
