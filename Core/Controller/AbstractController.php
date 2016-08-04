<?php

namespace Core\Controller;

use Core\Http\RequestInterface;
use League\Container\ContainerInterface;

/**
 * Class AbstractController
 *
 * @package Core\Controller
 */
abstract class AbstractController
{
	/**
	 * @var ContainerInterface
	 */
	protected $container;

	/**
	 * @var RequestInterface
	 */
	protected $request;

	/**
	 * @param ContainerInterface $container
	 */
	public function setContainer(ContainerInterface $container)
	{
		$this->container = $container;
	}

	/**
	 * @param RequestInterface $request
	 */
	public function setRequest(RequestInterface $request)
	{
		$this->request = $request;
	}
}