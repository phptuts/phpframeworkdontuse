<?php

namespace Core\Tests\Http;

use Core\Http\ParamBag;
use Core\Http\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
	public function testGetterForRequestObject() {
		$query = (new ParamBag())->add(['hello' => 'query']);
		$post = (new ParamBag())->add(['hello' => 'post']);
		$files = (new ParamBag())->add(['hello' => 'files']);
		$server = (new ParamBag())->add(['hello' => 'files']);
		$request = new Request('url', $query, $post, $files, $server);
		$this->assertEquals($query, $request->query());
		$this->assertEquals($post, $request->post());
		$this->assertEquals($files, $request->files());
		$this->assertEquals($server, $request->server());
		$this->assertEquals('url', $request->getUrl());
	}
}