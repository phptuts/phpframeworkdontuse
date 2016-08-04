<?php

namespace Core\Tests\Http;

use Core\Http\ParamBag;

class ParamBagTest extends \PHPUnit_Framework_TestCase
{

	public function testGetReturnKeyInArray()
	{
		$paramBag = (new ParamBag())->add(['cows' => 'moo', 'dog' => 'cat']);
		$this->assertEquals('moo', $paramBag->get('cows'));
	}

	public function testAllReturnAllValues() {
		$paramBag = (new ParamBag())->add(['cows' => 'moo', 'dog' => 'cat']);
		$this->assertEquals(['cows' => 'moo', 'dog' => 'cat'], $paramBag->all());

	}
}