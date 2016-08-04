<?php

namespace App\Controller;

use Core\Controller\AbstractController;
use Core\Http\Response;
use Core\Http\ResponseInterface;

class HomeController extends AbstractController
{
	/**
	 * Home Page
	 *
	 * @return Response
	 */
	public function homepage() {
		$response = new Response();
		$response->setContent('Hello World!')
				->setStatusCode(ResponseInterface::RESPONSE_CODE_GOOD)
				->setStatusMessage(ResponseInterface::RESPONSE_GOOD_TEXT);
		
		return $response;
	}

	/**
	 * Hello World with first and last name
	 *
	 * @param $firstName
	 * @param $lastName
	 *
	 * @return Response
	 */
	public function helloFirstAndLastName($firstName, $lastName) {
		$response = new Response();
		$response->setContent('Hello, ' . $firstName . ' ' .$lastName )
			->setStatusCode(ResponseInterface::RESPONSE_CODE_GOOD)
			->setStatusMessage(ResponseInterface::RESPONSE_GOOD_TEXT);

		return $response;
	}

	public function notFound() {
		$response = new Response();
		$response->setContent('Not Found' )
			->setStatusCode(ResponseInterface::RESPONSE_CODE_NOT_FOUND)
			->setStatusMessage(ResponseInterface::RESPONSE_NOT_FOUND_TEXT);

		return $response;
	}

}