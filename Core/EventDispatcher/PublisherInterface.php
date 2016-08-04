<?php

namespace Core\EventDispatcher;

/**
 * Interface PublisherInterface
 *
 * @package Core\EventDispatcher
 */
interface PublisherInterface {

	/**
	 * Data sent with the event 
	 * 
	 * @return EventInterface
	 */
	public function getEventData();

	/**
	 * @param EventInterface $event
	 *
	 * @return $this
	 */
	public function setEventData(EventInterface $event);

	/**
	 * Event Name
	 * 
	 * @return string
	 */
	public function getEventName();

	/**
	 * Subscribers Observer to Event
	 * 
	 * @param SubscriberInterface $observer
	 *
	 * @return $this
	 */
	public function attach(SubscriberInterface $observer);

	/**
	 * Unsubscribes Observer to Event
	 * 
	 * @param SubscriberInterface $observer
	 *
	 * @return $this
	 */
	public function detach(SubscriberInterface $observer);

	/**
	 * Loops through the observers and calls the update function
	 * 
	 * @return void
	 */
	public function notify();

	/**
	 * Gets the total number of observers subscribed to the event
	 * 
	 * @return integer
	 */
	public function totalSubscribers();
}