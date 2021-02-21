<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/../.env');
$debugMode = $_ENV['PRODUCTION_MODE'] == '0' ? Tracy\Debugger::DEVELOPMENT : Tracy\Debugger::PRODUCTION;

Tracy\Debugger::enable($debugMode, __DIR__ . '/../log');

$routerFactory = new Strategio\Router\RouterFactory;
$urlMatcher = $routerFactory->createRoutes();
$controllerData = $routerFactory->matchAsController($urlMatcher);

$action = $controllerData['_action'];
$template = isset($controllerData['template']) ? $controllerData['template'] : 'home';


/** @var \Strategio\Controller\IController $controller */
$controller = new $controllerData['_controller'];
$controller->$action($template);
