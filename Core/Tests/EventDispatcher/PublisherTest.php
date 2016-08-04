<?php

namespace Core\Tests\EventDispatcher;

use Core\EventDispatcher\AbstractSubscriber;
use Core\EventDispatcher\EventInterface;
use Core\EventDispatcher\Publisher;

class PublisherTest extends \PHPUnit_Framework_TestCase
{
	public function testGetters()
	{
		$publisher = new Publisher('example_event');
		$publisher->setEventData(new Event());
		$this->assertEquals('example_event', $publisher->getEventName());
		$this->assertEquals('data', $publisher->getEventData()->getData());
	}
	
	public function testAttachingAndDetachingSubscriber() {
		$publisher = new Publisher('example_event');
		$publisher->setEventData(new Event());
		$sub1 = new Sub();
		$sub2 = new Sub();
		$sub3 = new Sub();
		$publisher->attach($sub1)->attach($sub2);
		$this->assertEquals(2, $publisher->totalSubscribers());
		$publisher->detach($sub3);
		$this->assertEquals(2, $publisher->totalSubscribers());
		$publisher->detach($sub1);
		$this->assertEquals(1, $publisher->totalSubscribers());
	}

	public function testNotifyWorks() {
		$event = new Event();
		$publisher = new Publisher('example_event');
		$publisher->setEventData($event);
		$sub1 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$sub1->expects($this->once())->method('update')->with($event);
		$sub2 = $this->getMockBuilder('\Core\EventDispatcher\AbstractSubscriber')->disableOriginalConstructor()->getMock();
		$sub2->expects($this->once())->method('update')->with($event);
		$publisher->attach($sub1)->attach($sub2)->notify();
	}
	
	
}

class Event implements EventInterface
{

	public function getData()
	{
		return 'data';
	}
}

class Sub extends AbstractSubscriber {
	
	public function update(EventInterface $event)
	{
		
	}
}