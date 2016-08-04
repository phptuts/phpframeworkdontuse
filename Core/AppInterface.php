<?php

namespace Core;

use Core\Http\RequestInterface;
use Core\Http\ResponseInterface;

interface AppInterface {

	/**
	 * @param RequestInterface $request
	 *
	 * @return ResponseInterface
	 */
	public function handleRequest(RequestInterface $request);

}
