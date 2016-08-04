<?php

require_once '../vendor/autoload.php';
$config = require_once  '../App/config/config.php';


use Core\App;
use Core\Kernel;
use Core\Facade\RequestFacade;

/**
 * 1. Bootstraps Application
 * 2. Creates Request
 * 3. Handles Request
 * 4. Send Response
 */

$kernel = new Kernel();
$kernel->bootstrap($config);

$request = RequestFacade::createRequest();

$app = new App();
$response = $app->handleRequest($request);
$response->send();
