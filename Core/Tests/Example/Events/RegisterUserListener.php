<?php

namespace Core\Tests\Example\Events;

use Core\EventDispatcher\EventInterface;
use Core\EventDispatcher\SubscriberInterface;

class RegisterUserListener implements SubscriberInterface
{
	public function update(EventInterface $event)
	{
		$event->getData()->doSomething();
	}

}