<?php

namespace Core\Tests\Loader;

use Core\Kernel;
use Core\Loader\EventLoader;
use Core\Tests\Example\Events\Event;
use League\Container\Container;

class EventLoaderTest extends \PHPUnit_Framework_TestCase
{
	public function testEventLoader() {
		
		$container = new Container();
		$container->share('dispatcher', 'Core\EventDispatcher\Dispatcher');
		$container->share('listener1', 'Core\Tests\Example\Events\RegisterUserListener');
		$container->share('listener2', 'Core\Tests\Example\Events\AnotherRegisterUserListener');
		$eventData = $this->getMockBuilder('Core\Tests\Example\Events\EventData')
							->disableOriginalConstructor()
							->getMock();

		$eventData->expects($this->exactly(2))->method('doSomething');
		$event = new Event($eventData);
		$config = [[
			'name' => 'event1',
			'observers' => ['listener1', 'listener2']
		]];
		Kernel::setContainer($container);
		$eventloader = new EventLoader();
		$eventloader->load($config);
		$dispatcher = $container->get('dispatcher');
		$dispatcher->dispatch('event1', $event);
	}
}