<?php

namespace Core\Loader;

use Core\Kernel;

/**
 * Class EventLoader
 *
 * @package Core\Loader
 */
class EventLoader implements LoaderInterface
{
	/**
	 * @param $config
	 */
	public function load($config)
	{
		$container = Kernel::getContainer();
		$dispatcher = $container->get('dispatcher');

		foreach($config as $eventConfig) {
			$observers = $this->getObservers($eventConfig['observers']);
			$dispatcher->registerEvent($eventConfig['name'], $observers);
		}
	}

	/**
	 * @param $observersConfig
	 *
	 * @return array
	 */
	protected function getObservers($observersConfig) {
		
		$observers = [];
		$container = Kernel::getContainer();

		foreach ($observersConfig as $observerServiceName) {
			$observers[] = $container->get($observerServiceName);
		}
		
		return $observers;
		
	}

}