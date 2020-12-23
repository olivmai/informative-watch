<?php

use App\Http\Request;
use App\Http\Router;
use App\View\Twig;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db_config.php';

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$files = $_FILES;

$request = new Request([
    'path' => $path,
    'method' => $_SERVER['REQUEST_METHOD'],
    'parameters' => array_merge($_REQUEST, $files)
]);

$request->setPath($path);
$request->setMethod($_SERVER['REQUEST_METHOD']);
$request->setParameters(array_merge($_REQUEST, $files));

$router = new Router(new Twig());
$router->handle($request);
