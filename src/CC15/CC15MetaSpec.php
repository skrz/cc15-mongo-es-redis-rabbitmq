<?php
namespace CC15;

use Skrz\Bundle\AutowiringBundle\Annotation\Component;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\Meta\AbstractMetaSpec;
use Skrz\Meta\ConstantsModule;
use Skrz\Meta\JSON\JsonModule;
use Skrz\Meta\PHP\DateTimeFormattingSerializer;
use Skrz\Meta\PHP\PhpModule;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Component
 */
class CC15MetaSpec extends AbstractMetaSpec
{

	/** @var string */
	private $rootDir;

	public function __construct($rootDir)
	{
		$this->rootDir = $rootDir;

		parent::__construct();
	}

	protected function configure()
	{

		$this->setOutputPath($this->rootDir . "/gen-src");

		$phpModule = new PhpModule();
		$jsonModule = new JsonModule();
		$constantsModule = new ConstantsModule();

		$datetimeFormattingSerializer = new DateTimeFormattingSerializer(\DateTime::ISO8601);
		$datetimeFormattingSerializer->addGroup("json:");

		$datetimePassthruSerializer = new DatetimePassthruPropertySerializer();

		$mongoIdPropertySerializer = new MongoIdPropertySerializer();
		$mongoIdPropertySerializer->addStringifyGroup("json:");

		$phpModule
			->addPropertySerializer($datetimeFormattingSerializer)
			->addPropertySerializer($datetimePassthruSerializer) // must be after formatting serializer
			->addPropertySerializer($mongoIdPropertySerializer);

		$this
			->match("CC15\\Entity\\**")
			->match("CC15\\MQ\\VO\\**")
			->notMatch("**Enum")
			->addModule($phpModule)
			->addModule($jsonModule)
			->addModule($constantsModule);
	}

}
