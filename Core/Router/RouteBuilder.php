<?php

namespace Core\Router;

use Core\Http\RequestInterface;
use Core\Kernel;

/**
 * Class RouteBuilder
 *
 * @package Core\Router
 */
class RouteBuilder implements RouteBuilderInterface
{
	/**
	 * Creates a Route
	 * 
	 * @param $route
	 * @param $params
	 * @param RequestInterface $request
	 *
	 * @return $this
	 */
	public function create($route, $params,  RequestInterface $request) {
		/**	@var \Core\Controller\AbstractController $controller **/
		$controller = new $route['controller'];
		$controller->setContainer(Kernel::getContainer());
		$controller->setRequest($request);

		return (new Route())->setArgs($params)
					->setController($controller)
					->setMethod($route['method']);
	}
}