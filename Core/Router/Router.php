<?php

namespace Core\Router;

use Core\Http\RequestInterface;
use Core\Loader\LoaderInterface;

/**
 * Class Router
 *
 * @package Core\Router
 */
class Router implements RouterInterface, LoaderInterface
{

	/**
	 * @var array
	 */
	protected $routes;

	/**
	 * @var RouteBuilderInterface
	 */
	protected $routeBuilder;
	
	public function __construct(RouteBuilderInterface $routeBuilder)
	{
		$this->routeBuilder = $routeBuilder;
	}

	/**
	 * @param $config
	 *
	 * @return $this
	 */
	public function load($config)
	{
		$this->routes = $config;
		
		return $this;
	}

	/**
	 * Loops through the routes and returns a response
	 * 
	 * @param RequestInterface $request
	 *
	 * @return RouteInterface
	 */
	public function route(RequestInterface $request)
	{

		foreach ($this->routes as $route) {

			$regex = $this->getRegex($route['path']);
			preg_match($regex, $request->getUrl(), $matches);
			if (!empty($matches)) {
				return $this->routeBuilder->create($route, array_slice($matches, 1), $request);
			}
		}

		return $this->redirectTo404($request);
	}

	/**
	 * Creates a regex string
	 * 
	 * @param $url
	 *
	 * @return string
	 */
	protected function getRegex($url)
	{
		return '/^' . str_replace(self::ROUTE_PARAM, '(\w+)', str_replace('/', '\/', $url)) . '$/';
	}

	/**
	 * @param RequestInterface $request
	 *
	 * @return RouteInterface
	 */
	protected function redirectTo404(RequestInterface $request)
	{
		$route = array_values(array_filter($this->routes, function($route) {
			return $route['name'] === '404';
		}));

		return $this->routeBuilder->create($route[0], [], $request);
	}

}