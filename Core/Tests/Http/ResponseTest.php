<?php

namespace Core\Tests\Http;

use Core\Http\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
	public function testSettersAndGetters() {
		$response = new Response();
		$this->assertEquals('content', $response->setContent('content')->getContent());
		$this->assertEquals(['key' => 'value'], $response->addHeader('key', 'value')->getHeaders());
		$this->assertEquals(200, $response->setStatusCode(200)->getStatusCode());
		$this->assertEquals('statusMessage', $response->setStatusMessage('statusMessage')->getStatusMessage());
	}
}