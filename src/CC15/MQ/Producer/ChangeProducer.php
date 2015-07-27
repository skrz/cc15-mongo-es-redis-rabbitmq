<?php
namespace CC15\MQ\Producer;

use Skrz\Bundle\BunnyBundle\AbstractProducer;
use Skrz\Bundle\BunnyBundle\Annotation\Producer;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Producer(
 *     exchange="change",
 *     meta="CC15\MQ\VO\Meta\ChangeMeta"
 * )
 */
class ChangeProducer extends AbstractProducer
{
}
