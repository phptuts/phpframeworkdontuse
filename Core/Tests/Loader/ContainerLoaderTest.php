<?php

namespace Core\Tests\Loader;

use Core\Kernel;
use Core\Loader\ContainerLoader;
use Core\Service\Argument;
use League\Container\Container;

class ContainerLoaderTest extends \PHPUnit_Framework_TestCase
{
	public function testContainerLoader() {
		
		Kernel::setContainer(new Container());
		$config = [
					   [
						   'name' =>  'php.maker',
						   'class' => 'Core\Tests\Example\PHPMaker',
						   'args' => [
							   ['value' => 'blue', 'type' => Argument::TYPE_RAW]
							],
						   'shared' => true
					   ],
						[
							'name' =>  'stuff.processor',
							'class' => 'Core\Tests\Example\StuffProcessor',
							'shared' => true
						],
						[
							'name' => 'custom.mediator',
							'class' => 'Core\Tests\Example\CustomMediator',
							'args' => [
								['value' => 'stuff.processor', 'type' => Argument::TYPE_SERVICE],
								['value' => 'php.maker', 'type' => Argument::TYPE_SERVICE],
							],
							'shared' => true
						]

		];

		$containerLoader = new ContainerLoader();
		$containerLoader->load($config);

		$container = Kernel::getContainer();
		$this->assertEquals('blue' , $container->get('custom.mediator')->getColor());
		$this->assertEquals( ['success' => true] , $container->get('custom.mediator')->doSomething());
		$this->assertEquals('Hello World, Noah',  $container->get('custom.mediator')->helloWorld('Noah'));
	}
}