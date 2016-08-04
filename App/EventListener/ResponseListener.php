<?php

namespace App\EventListener;

use Core\EventDispatcher\AbstractSubscriber;
use Core\EventDispatcher\EventInterface;
use Core\Http\ResponseInterface;

class ResponseListener extends AbstractSubscriber
{
	public function update(EventInterface $event)
	{
		/** @var ResponseInterface $response */
		$response = $event->getData();
		$response->setContent('<!-- Hidden --> ' . $response->getContent());
	}

}