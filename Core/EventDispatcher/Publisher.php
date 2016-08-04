<?php

namespace Core\EventDispatcher;

/**
 * The Class to used keep track of all the observers
 * 
 * Class Publisher
 *
 * @package Core\EventDispatcher
 */
final class Publisher implements PublisherInterface
{
	/**
	 * @var array
	 */
	protected $observers;

	/**
	 * @var EventInterface
	 */
	protected $event;
	
	/**
	 * @var string
	 */
	protected $name;

	public function __construct($name)
	{
		$this->observers = [];
		$this->name = $name;
	}

	/**
	 * Attaches Observer to event system
	 * 
	 * @param SubscriberInterface $observer
	 * @return $this
	 */
	public function attach(SubscriberInterface $observer)
	{
		$key = array_search($observer,$this->observers, true);
		if ($key === false){
			$this->observers[] = $observer;
		}

		return $this;
	}

	/**
	 * Removes Observer to event system
	 *
	 * @param SubscriberInterface $observer
	 * @return $this
	 */
	public function detach(SubscriberInterface $observer)
	{
		$key = array_search($observer,$this->observers, true);
		if ($key !== false){
			unset($this->observers[$key]);
		}

		return $this;
	}

	/**
	 * Sums the number of objects subscribed to the event
	 *
	 * @return mixed
	 */
	public function totalSubscribers()
	{
		return count($this->observers);
	}

	/**
	 * Creates the event
	 * 
	 */
	public function notify() {
		/** @var SubscriberInterface $observer*/
		foreach ($this->observers as $observer) {
			$observer->update($this->getEventData());
		}
	}

	/**
	 * Gets the event information being passed
	 * 
	 * @return EventInterface
	 */
	public function getEventData() {
		return $this->event;
	}

	/**
	 * Sets the data for the event
	 * 
	 * @param EventInterface $event
	 *
	 * @return $this
	 */
	public function setEventData(EventInterface $event){
		$this->event = $event;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEventName() {
		return $this->name;
	}

}