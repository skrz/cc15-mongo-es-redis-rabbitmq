<?php
namespace CC15\Command;

use CC15\Entity\Feed;
use CC15\Entity\Meta\CategoryMeta;
use CC15\Entity\Meta\ProductMeta;
use CC15\Entity\Meta\EshopMeta;
use CC15\Entity\Eshop;
use CC15\Repository\EshopRepository;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Component;
use Skrz\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Component("command.mongo")
 */
class MongoCommand extends AbstractCommand
{

	/**
	 * @var \MongoDB
	 *
	 * @Autowired
	 */
	public $mongo;

	/**
	 * @var EshopRepository
	 *
	 * @Autowired
	 */
	public $eshopRepository;

	/**
	 * Configures the current command.
	 */
	protected function configure()
	{
		$this
			->setDescription("Sets up MongoDB.")
			->addArgument("csv", InputArgument::REQUIRED, "CSV with eshops and feeds.");
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$categoryCol = $this->mongo->createCollection(CategoryMeta::SHORT_NAME);
		var_dump($categoryCol->ensureIndex([CategoryMeta::ESHOP_ID => 1, CategoryMeta::HASH => 1], ["unique" => true]));

		$productCol = $this->mongo->createCollection(ProductMeta::SHORT_NAME);
		var_dump($productCol->ensureIndex([ProductMeta::ESHOP_ID => 1, ProductMeta::ITEM_GROUP_ID => 1, ProductMeta::ITEM_ID => 1], ["unique" => true]));
		var_dump($productCol->ensureIndex(["_id" => 1, ProductMeta::V => 1], ["unique" => true]));

		$eshopCol = $this->mongo->createCollection(EshopMeta::SHORT_NAME);
		var_dump($eshopCol->ensureIndex([EshopMeta::SLUG => 1]), ["unique" => true]);

		$f = fopen($input->getArgument("csv"), "r");
		while (list($slug, $url, $feedUrl) = fgetcsv($f)) {
			$eshop = new Eshop();
			$eshop
				->setName($slug)
				->setSlug($slug)
				->setUrl($url)
				->setFeeds([
					(new Feed())
						->setId(new \MongoId())
						->setUrl($feedUrl)
				]);

			$eshopDoc = $this->eshopRepository->findAndModify(
				[EshopMeta::SLUG => $slug],
				EshopMeta::toArray($eshop),
				["_id"],
				["upsert" => true, "new" => true]
			);

			var_dump($eshopDoc);
		}
	}

}
