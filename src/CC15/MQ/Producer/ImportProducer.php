<?php
namespace CC15\MQ\Producer;

use Skrz\Bundle\BunnyBundle\AbstractProducer;
use Skrz\Bundle\BunnyBundle\Annotation\Producer;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Producer(
 *     exchange="",
 *     routingKey="feed_import",
 *     meta="CC15\MQ\VO\Meta\ImportMeta"
 * )
 */
class ImportProducer extends AbstractProducer
{
}
