<?php

namespace Core\Tests\App;

use Core\App;
use Core\Events\Http\BeforeRequestEvent;
use Core\Events\Http\BeforeResponseSent;
use Core\Http\ParamBag;
use Core\Http\Request;
use Core\Http\ResponseInterface;
use Core\Kernel;

class AppTest extends \PHPUnit_Framework_TestCase
{
	public function testHandleRequest() {

		$request = new Request('/example/home', new ParamBag(), new ParamBag(), new ParamBag(), new ParamBag());
		$container = $this->getMockBuilder('League\Container\ContainerInterface')->disableOriginalConstructor()->getMock();

		$route = $this->getMockBuilder('Core\Router\RouteInterface')->disableOriginalConstructor()->getMock();
		$route->expects($this->exactly(2))->method('getController')->will($this->returnValue(new \Core\Tests\Controller\Example()));
		$route->expects($this->once())->method('getMethod')->will($this->returnValue('hello'));
		$route->expects($this->once())->method('getArguments')->will($this->returnValue(['noah', 'glaser']));


		$router = $this->getMockBuilder('Core\Router\RouterInterface')->disableOriginalConstructor()->getMock();
		$router->expects($this->once())->method('route')->with($request)->willReturn($route);

		$dispatcher = $this->getMockBuilder('Core\EventDispatcher\Dispatcher')->setMethods(['dispatch'])->disableOriginalConstructor()->getMock();
		$dispatcher->expects($this->at(0))->method('dispatch')->with(App::BEFORE_REQUEST, $this->callback(function(BeforeRequestEvent $event) use ($request) {
			$this->assertEquals($request, $event->getData());
			return true;
		}));
		$dispatcher->expects($this->at(1))->method('dispatch')->with(App::BEFORE_RESPONSE, $this->callback(function(BeforeResponseSent $event) {
			$response = $event->getData();
			$this->assertEquals('Hello, noah glaser', $response->getContent());
			return true;
		}));

		$container->expects($this->at(0))->method('get')->with('dispatcher')->will($this->returnValue($dispatcher));
		$container->expects($this->at(1))->method('get')->with('router')->will($this->returnValue($router));

		Kernel::setContainer($container);
		$app = new App();

		$resposneFromRouter = $app->handleRequest($request);
		$this->assertEquals('Hello, noah glaser', $resposneFromRouter->getContent());
		$this->assertEquals(200, $resposneFromRouter->getStatusCode());
		$this->assertEquals(ResponseInterface::RESPONSE_GOOD_TEXT, $resposneFromRouter->getStatusMessage());
	}
}