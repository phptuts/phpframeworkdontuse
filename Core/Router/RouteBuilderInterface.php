<?php

namespace Core\Router;

use Core\Http\RequestInterface;

/**
 * Interface RouteBuilderInterface
 *
 * @package Core\Router
 */
interface RouteBuilderInterface {

	/**
	 * @param $route
	 * @param $params
	 * @param RequestInterface $request
	 *
	 * @return RouteInterface
	 */
	public function create($route, $params, RequestInterface $request);
}