<?php

$config = [];

$config['services'] = [];
$config['services'][] = ['name' => 'route_builder', 'class' => 'Core\Router\RouteBuilder'];
$config['services'][] = ['name' => 'router', 'class' => 'Core\Router\Router', 'args' => [
			['value' => 'route_builder', 'type' => \Core\Service\Argument::TYPE_SERVICE]
	]
];
$config['services'][] = ['name' => 'dispatcher', 'class' => 'Core\EventDispatcher\Dispatcher'];

$config['events'] = [];

$config['routes'] = [];


return $config;