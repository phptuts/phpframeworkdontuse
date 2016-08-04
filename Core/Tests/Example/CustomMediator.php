<?php

namespace Core\Tests\Example;

class CustomMediator
{
	private $stuff;
	
	private $maker;
	
	public function __construct(StuffProcessor $stuffProcessor, PHPMaker $maker)
	{
		$this->stuff = $stuffProcessor;
		$this->maker = $maker;
	}
	
	public function getColor() {
		return $this->maker->getColor();
	}
	
	public function helloWorld($name) {
		return 'Hello World, ' . $name;
	}
	
	public function doSomething() {
		return $this->stuff->doingSomething();
	}
}