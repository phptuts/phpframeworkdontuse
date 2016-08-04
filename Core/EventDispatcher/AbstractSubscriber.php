<?php

namespace Core\EventDispatcher;

/**
 * Used a base class for listeners
 * 
 * Class AbstractSubscriber
 *
 * @package Core\EventDispatcher
 */
abstract class AbstractSubscriber implements SubscriberInterface
{
	/**
	 * @param EventInterface $event
	 *
	 * @return mixed
	 */
	abstract public function update(EventInterface $event);
}