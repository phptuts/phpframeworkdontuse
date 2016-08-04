<?php

namespace Core\EventDispatcher;

/**
 * Used to subscribe to the event
 * 
 * Interface SubscriberInterface
 *
 * @package Core\EventDispatcher
 */
interface SubscriberInterface {

	/**
	 * @param EventInterface $event
	 *
	 * @return mixed
	 */
	public function update(EventInterface $event);
	
}