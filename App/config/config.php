<?php

$config  = require_once '../Core/Config/BaseConfig.php';

$config['services'][] = ['name' => 'response_listener', 'class' => 'App\EventListener\ResponseListener'];
$config['services'][] = ['name' => 'market_service', 'class' => 'App\Service\MarketService'];
$config['services'][] = ['name' => 'farm_service', 'class' => 'App\Service\FarmService', 'args' => [
	['value' => 'market_service', 'type' => \Core\Service\Argument::TYPE_SERVICE]
], 'shared' => true];


$config['events'][] = ['name' => \Core\App::BEFORE_REQUEST, 'observers' => []];
$config['events'][] = ['name' => \Core\App::BEFORE_RESPONSE, 'observers' => ['response_listener']];

$config['routes'][] = ['name' => 'home',
					   'path' => "/" ,
					   'controller' =>'App\Controller\HomeController',
						'method' => 'homepage'
					  ];
$config['routes'][] = ['name' => 'home',
						 'path' => "/hello/" . \Core\Router\RouterInterface::ROUTE_PARAM . '/' .  \Core\Router\RouterInterface::ROUTE_PARAM,
						 'controller' =>'App\Controller\HomeController',
						 'method' => 'helloFirstAndLastName'
];

$config['routes'][] = ['name' => '404',
					   'path' => "/404/",
					   'controller' =>'App\Controller\HomeController',
					   'method' => 'notFound'
];

$config['routes'][] = ['name' => 'buy_cows',
					   'path' => "/cows/buy/".  \Core\Router\RouterInterface::ROUTE_PARAM ,
					   'controller' =>'App\Controller\CowController',
					   'method' => 'buyCows'
];


$config['routes'][] = ['name' => 'sell_cows',
					   'path' => "/cows/sell/".  \Core\Router\RouterInterface::ROUTE_PARAM ,
					   'controller' =>'App\Controller\CowController',
					   'method' => 'sellCows'
];




return $config;

