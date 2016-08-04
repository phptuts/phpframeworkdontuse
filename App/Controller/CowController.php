<?php

namespace App\Controller;

use App\Model\Cow;
use Core\Controller\AbstractController;
use Core\Http\Response;
use Core\Http\ResponseInterface;

class CowController extends AbstractController
{
	/**
	 * Example of using a service
	 *
	 * @param $num
	 *
	 * @return Response
	 */
	public function buyCows($num) {
		$farmService = $this->container->get('farm_service');
		$farmService->addMoney(300);
		$farmService->buyAnimals(new Cow(), $num);

		$text = "Buying {$num} cows you will have $" . number_format($farmService->balance(), 2);

		$response = new Response();
		$response->setContent($text)
			->setStatusCode(ResponseInterface::RESPONSE_CODE_GOOD)
			->setStatusMessage(ResponseInterface::RESPONSE_GOOD_TEXT);
		
		return $response;
	}

	/**
	 * Example of using a service
	 *
	 * @param $num
	 *
	 * @return Response
	 */
	public function sellCows($num) {
		$farmService = $this->container->get('farm_service');
		$farmService->addMoney(300);
		$farmService->sellAnimals(new Cow(), $num);

		$text = "After Selling {$num} cows you will have $" . number_format($farmService->balance(), 2);

		$response = new Response();
		$response->setContent($text)
			->setStatusCode(ResponseInterface::RESPONSE_CODE_GOOD)
			->setStatusMessage(ResponseInterface::RESPONSE_GOOD_TEXT);

		return $response;
	}
	
}