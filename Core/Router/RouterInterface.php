<?php

namespace Core\Router;

use Core\Http\RequestInterface;

interface RouterInterface 
{

	/**
	 * Used to create a variable for a route
	 */
	const ROUTE_PARAM = '{var}';

	/**
	 * @param RequestInterface $request
	 *
	 * @return $this
	 */
	public function route(RequestInterface $request);

}