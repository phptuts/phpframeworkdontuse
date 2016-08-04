<?php

namespace Core\Tests\Example;

class PHPMaker
{
	private $color;
	
	function __construct($color)
	{
		$this->color = $color;
	}

	/**
	 * @return mixed
	 */
	public function getColor() 
	{
		return $this->color;
	}
}