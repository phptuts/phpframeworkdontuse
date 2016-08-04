<?php

namespace Core\Router;

use Core\Controller\AbstractController;

/**
 * Interface RouteInterface
 *
 * @package Core\Router
 */
interface RouteInterface
{
	/**
	 * @return AbstractController
	 */
	public function getController();

	/**
	 * @return array
	 */
	public function getArguments();

	/**
	 * @return string
	 */
	public function getMethod();
	
}