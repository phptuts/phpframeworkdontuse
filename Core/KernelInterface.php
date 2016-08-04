<?php

namespace Core;

use League\Container\ContainerInterface;

/**
 * Interface KernelInterface
 *
 * @package Core
 */
interface  KernelInterface {

	/**
	 * @return ContainerInterface
	 */
	public static function getContainer();

	/**
	 * @param ContainerInterface $container
	 *
	 * @return void
	 */
	public static function setContainer(ContainerInterface $container);

	/**
	 * @param $config
	 *
	 * @return void
	 */
	public function bootstrap($config);
	
}