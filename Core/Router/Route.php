<?php

namespace Core\Router;

use Core\Controller\AbstractController;

/**
 * Everything you need to create response
 * 
 * Class Route
 *
 * @package Core\Router
 */
class Route implements RouteInterface
{
	/**
	 * @var AbstractController
	 */
	protected $controller;

	/**
	 * @var array
	 */
	protected $args;

	/**
	 * @var string
	 */
	protected $method;
	

	/**
	 * @return AbstractController
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * @return array
	 */
	public function getArguments()
	{
		return $this->args;
	}

	/**
	 * @return string
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * @param AbstractController $controller
	 *
	 * @return $this
	 */
	public function setController($controller)
	{
		$this->controller = $controller;

		return $this;
	}

	/**
	 * @param array $args
	 *
	 * @return $this
	 */
	public function setArgs($args)
	{
		$this->args = $args;

		return $this;
	}

	/**
	 * @param string $method
	 *
	 * @return $this
	 */
	public function setMethod($method)
	{
		$this->method = $method;

		return $this;
	}
	
	

}
