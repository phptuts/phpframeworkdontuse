<?php

namespace Core;

use Core\Events\Http\BeforeRequestEvent;
use Core\Events\Http\BeforeResponseSent;
use Core\Http\RequestInterface;
use Core\Http\ResponseInterface;

/**
 * Class App
 *
 * @package Core
 */
class App implements AppInterface
{
	/**
	 * Event that is fire before request is processed 
	 */
	const BEFORE_REQUEST = 'before.request';

	/**
	 * Event that is fired before the response is sent
	 */
	const BEFORE_RESPONSE = 'before.response';

	/**
	 * Handles Request
	 * 
	 * @param RequestInterface $request
	 *
	 * @return ResponseInterface
	 */
	public function handleRequest(RequestInterface $request)
	{
		$dispatcher = Kernel::getContainer()->get('dispatcher');
		$dispatcher->dispatch(self::BEFORE_REQUEST, new BeforeRequestEvent($request));

		/**	@var \Core\Router\RouteInterface $route **/
		$route = Kernel::getContainer()->get('router')->route($request);

		$reflection = new \ReflectionClass(get_class($route->getController()));
		$closure = $reflection->getMethod($route->getMethod())->getClosure($route->getController());
		$response =call_user_func_array($closure, $route->getArguments());


		$dispatcher->dispatch(self::BEFORE_RESPONSE, new BeforeResponseSent($response));

		return $response;
	}

}