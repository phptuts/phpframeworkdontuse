<?php

namespace Core\Tests\Controller;

use Core\Controller\AbstractController;
use Core\Http\Response;
use Core\Http\ResponseInterface;

class Example extends AbstractController
{
	public function hello($firstName, $lastName) {
		$response = new Response();
		$response->setContent('Hello, ' . $firstName . ' ' . $lastName)
		 	->setStatusMessage(ResponseInterface::RESPONSE_GOOD_TEXT)
			->setStatusCode(ResponseInterface::RESPONSE_CODE_GOOD);
		
		return $response;
	}
}