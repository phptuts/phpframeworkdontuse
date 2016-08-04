<?php

namespace Core\Events\Http;

use Core\EventDispatcher\EventInterface;
use Core\Http\ResponseInterface;

/**
 * Data sent to subscribers before resposne
 * 
 * Class BeforeResponseSent
 *
 * @package Core\Events\Http
 */
class BeforeResponseSent implements EventInterface
{
	/**
	 * @var ResponseInterface
	 */
	protected $response;

	/**
	 * BeforeResponseSent constructor.
	 *
	 * @param ResponseInterface $response
	 */
	public function __construct(ResponseInterface $response)
	{
		$this->response = $response;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getData()
	{
		return $this->response;
	}
}