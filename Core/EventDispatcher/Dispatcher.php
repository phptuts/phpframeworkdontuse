<?php

namespace Core\EventDispatcher;

/**
 * A mediator for triggering events
 * 
 * Class Dispatcher
 *
 * @package Core\EventDispatcher
 */
class Dispatcher
{
	protected $publishers = [];

	/**
	 * Register an event
	 * 
	 * @param $name
	 * @param $observers
	 *
	 * @throws \Exception
	 */
	public function registerEvent($name, $observers)
	{
		if (!$this->exists($name)) {
			$publisher = new Publisher($name);
			foreach ($observers as $observer) {
				/** @var AbstractSubscriber $observer */
				$publisher->attach($observer);
			}
			$this->publishers[$publisher->getEventName()] = $publisher;
		}
		else {
			throw new \Exception("Duplicate Event Names Not Allowed!, This event name is already registered: " . $name);
		}
	}

	/**
	 * Dispatches an event
	 * 
	 * @param $name
	 * @param EventInterface $event
	 *
	 * @throws \Exception
	 */
	public function dispatch($name, EventInterface $event)
	{
		if (!$this->exists($name)) {
			throw new \Exception("No events have the name : " . $name . " , please register the event");
		}
		$this->publishers[$name]
			->setEventData($event)
			->notify();
	}

	/**
	 * Check if publisher is set
	 * 
	 * @param $name
	 *
	 * @return bool
	 */
	protected function exists($name)
	{
		return isset($this->publishers[$name]) && !empty($this->publishers[$name]);
	}

}