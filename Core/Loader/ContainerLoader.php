<?php

namespace Core\Loader;

use Core\Service\Argument;
use Core\Service\Service;
use League\Container\Argument\RawArgument;
use League\Container\Container;
use Core\Kernel;

/**
 * Class ContainerLoader
 *
 * @package Core\Loader
 */
class ContainerLoader implements LoaderInterface
{
	/**
	 * @var Container
	 */
	protected $container;

	/**
	 * ContainerLoader constructor.
	 */
	public function __construct()
	{
		ini_set('display_errors', 'on');
		if (Kernel::getContainer() == null) {
			Kernel::setContainer(new Container());
		}

		$this->container = Kernel::getContainer();
	}

	/**
	 * Loads a service config
	 * 
	 * @param $config
	 */
	public function load($config)
	{
		foreach ($config as $serviceConfig) {
			$this->addService(
				new Service($serviceConfig['name'], $serviceConfig['class'],
					(isset($serviceConfig['args']) ? $this->loadArgs($serviceConfig['args']): []),
					(isset($serviceConfig['shared']) && $serviceConfig['shared']))
			);
		}
	}

	/**
	 * Loads args
	 * 
	 * @param $argsConfig
	 *
	 * @return array
	 */
	protected function loadArgs($argsConfig)
	{
		$args = [];

		foreach ($argsConfig as $arg) {
			$args[] = new Argument($arg['value'], $arg['type']);
		}

		return $args;
	}

	/**
	 * @param Service $service
	 */
	protected function addService(Service $service)
	{
		if ($service->isShared()) {
			$this->container->share($service->getName(), $service->getClass());
		} else {
			$this->container->add($service->getName(), $service->getClass());
		}

		$definition = $this->container->extend($service->getName());

		foreach ($service->getArgs() as $arg) {
			/** @var Argument $arg */
			if ($arg->getType() === Argument::TYPE_SERVICE) {
				$definition->withArgument($this->container->get($arg->getValue()));
			} else {
				$definition->withArgument(new RawArgument($arg->getValue()));
			}
		}
	}
}