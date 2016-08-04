<?php

namespace Core\EventDispatcher;

/**
 * The thing that stores the data 
 *
 * Interface EventInterface
 *
 * @package Core\EventDispatcher
 */
interface EventInterface {
	
	/**
	 * @return mixed gets data for the event
	 */
	public function getData();
}