<?php

namespace Core\Tests\Example\Events;

use Core\EventDispatcher\EventInterface;

class Event implements EventInterface
{
	private $data;
	
	public function  __construct($data)
	{
		$this->data = $data;
	}

	public function getData()
	{
		return $this->data;
	}

}