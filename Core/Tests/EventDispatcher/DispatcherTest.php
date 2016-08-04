<?php

namespace Core\Tests\EventDispatcher;

use Core\EventDispatcher\Dispatcher;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{
	public function testDuplicateEventThrowException() {

		$this->setExpectedException('Exception');
		$sub1 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$sub2 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$dispatcher = new Dispatcher();
		$dispatcher->registerEvent('user.register', [$sub1, $sub2]);
		$sub3 = $this->getMockBuilder('\Core\EventDispatcher\AbstractObserver')->disableOriginalConstructor()->getMock();
		$dispatcher->registerEvent('user.register', [$sub3]);

	}

	public function testEventFiringNotRegisterThrowsException() {

		$this->setExpectedException('Exception');
		$sub1 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$sub2 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$dispatcher = new Dispatcher();
		$dispatcher->registerEvent('user.register', [$sub1, $sub2]);
		$dispatcher->dispatch('user.reset_password', new Event());
	}

	public function testEventFiringTriggersUpdateOnSubscribers() {

		$event = new Event();
		$sub1 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$sub1->expects($this->once())->method('update')->with($event);
		$sub2 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$sub2->expects($this->once())->method('update')->with($event);
		$dispatcher = new Dispatcher();
		$dispatcher->registerEvent('user.register', [$sub1, $sub2]);
		$dispatcher->dispatch('user.register', $event);

	}
}
