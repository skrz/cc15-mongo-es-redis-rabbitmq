<?php
namespace CC15\Command;

use CC15\CC15MetaSpec;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Component;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Component("command.generate.metas")
 */
class GenerateMetasCommand extends AbstractCommand
{

	/**
	 * @var string
	 *
	 * @Value("%kernel.root_dir%")
	 */
	public $rootDir;

	/**
	 * @var CC15MetaSpec
	 *
	 * @Autowired
	 */
	public $spec;

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$finder = new Finder();
		$finder->in([
			$this->rootDir . "/src/CC15/Entity",
			$this->rootDir . "/src/CC15/MQ/VO",
		])
			->name("*.php")
			->files();

		foreach ($finder as $file) {
			/** @var \SplFileInfo $file */
			$this->spec->processFile($file->getPathname());
		}
	}

}
