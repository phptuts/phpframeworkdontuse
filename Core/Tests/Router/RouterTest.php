<?php

namespace Core\Tests\Router;

use Core\Http\ParamBag;
use Core\Http\Request;
use Core\Kernel;
use Core\Router\RouteBuilder;
use Core\Router\Router;


class RouterTest extends \PHPUnit_Framework_TestCase
{
	public function testRouterReturnRoute() {

		$container = $this->getMockBuilder('League\Container\ContainerInterface')->disableOriginalConstructor()->getMock();
		Kernel::setContainer($container);

		$routes = [];
		$routes[] = [
			'name' => 'test_route',
			'path' => "/hello/" . Router::ROUTE_PARAM . "/" . Router::ROUTE_PARAM,
			'controller' =>'Core\Tests\Controller\Example',
			'method' => 'hello'
		];
		
		$routes[] = [
			'name' => '404',
			'path' => "/404",
			'controller' =>'Core\Tests\Controller\Example',
			'method' => 'hello'
		];

		$request = new Request('/hello/noah/glaser', new ParamBag(), new ParamBag(), new ParamBag(), new ParamBag());
		$router = new Router(new RouteBuilder());
		$route = $router->load($routes)->route($request);
		$this->assertInstanceOf($routes[0]['controller'], $route->getController());
		$this->assertEquals('hello', $route->getMethod());
		$this->assertEquals('noah', $route->getArguments()[0]);
		$this->assertEquals('glaser', $route->getArguments()[1]);
	}

	public function testRouteNotFoundReturn404() {

		$container = $this->getMockBuilder('League\Container\ContainerInterface')->disableOriginalConstructor()->getMock();
		Kernel::setContainer($container);

		$routes = [];
		$routes[] = [
			'name' => 'test_route',
			'path' => "/hello/" . Router::ROUTE_PARAM . "/" . Router::ROUTE_PARAM,
			'controller' =>'Core\Tests\Controller\Example',
			'method' => 'hello'
		];

		$routes[] = [
			'name' => '404',
			'path' => "/hello/" . Router::ROUTE_PARAM . "/" . Router::ROUTE_PARAM,
			'controller' =>'Core\Tests\Controller\Example',
			'method' => 'notFound'
		];

		$request = new Request('blue/moo', new ParamBag(), new ParamBag(), new ParamBag(), new ParamBag());
		$router = new Router(new RouteBuilder());
		$route = $router->load($routes)->route($request);
		$this->assertInstanceOf($routes[0]['controller'], $route->getController());
		$this->assertEquals('notFound', $route->getMethod());
		$this->assertEmpty($route->getArguments());

	}
}