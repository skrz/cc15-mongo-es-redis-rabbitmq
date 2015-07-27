<?php
namespace CC15\Controller;

use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class BaseController extends Controller
{

	/**
	 * @param ContainerInterface $container
	 *
	 * @Autowired
	 */
	public function setContainerImpl(ContainerInterface $container)
	{
		parent::setContainer($container);
	}

}
