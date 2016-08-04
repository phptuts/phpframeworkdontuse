<?php

namespace Core\Events\Http;

use Core\EventDispatcher\EventInterface;
use Core\Http\RequestInterface;

/**
 * Data sent to subscribers BeforeRequestEvent
 * 
 * Class BeforeRequestEvent
 *
 * @package Core\Events\Http
 */
class BeforeRequestEvent implements EventInterface
{

	/**
	 * @var RequestInterface
	 */
	protected $request;

	/**
	 * BeforeRequestEvent constructor.
	 *
	 * @param RequestInterface $request
	 */
	public function __construct(RequestInterface $request)
	{
		$this->request = $request;
	}

	/**
	 * @return RequestInterface
	 */
	public function getData()
	{
		return $this->request;
	}

}