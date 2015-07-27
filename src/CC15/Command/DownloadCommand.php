<?php
namespace CC15\Command;

use CC15\Entity\Eshop;
use CC15\MQ\Producer\DownloadProducer;
use CC15\MQ\VO\Import;
use CC15\Repository\EshopRepository;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Component;
use Skrz\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Component("command.download")
 */
class DownloadCommand extends AbstractCommand
{

	/**
	 * @var EshopRepository
	 *
	 * @Autowired
	 */
	public $eshopRepository;

	/**
	 * @var DownloadProducer
	 *
	 * @Autowired
	 */
	public $downloadProducer;

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		foreach ($this->eshopRepository->find([]) as $eshop) {
			/** @var Eshop $eshop */

			foreach ($eshop->getFeeds() as $feed) {
				$import = new Import();
				$import
					->setEshop($eshop)
					->setFeed($feed);

				$this->downloadProducer->publish($import);
			}
		}
	}

}
