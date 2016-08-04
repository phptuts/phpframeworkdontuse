<?php

namespace Core;

use Core\Loader\ContainerLoader;
use Core\Loader\EventLoader;
use League\Container\ContainerInterface;

/**
 * Class Kernel
 *
 * @package Core
 */
class Kernel implements KernelInterface
{
	/**
	 * @var ContainerInterface
	 */
	protected static $container;
	
	/**
	 * @return ContainerInterface
	 */
	public static function getContainer()
	{
		return self::$container;
	}

	/**
	 * @param ContainerInterface $container
	 */
	public static function setContainer(ContainerInterface $container) 
	{
		self::$container = $container;
	}

	/**
	 * Loads all the configuration and class up
	 * 
	 * @param $config
	 */
	public function bootstrap($config)
	{
		(new ContainerLoader())->load($config['services']);
		(new EventLoader())->load($config['events']);
		self::getContainer()->get('router')->load($config['routes']);
	}

}