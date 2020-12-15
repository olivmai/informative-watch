<?php

use App\Http\Request;
use App\Http\Router;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';

$request = new Request([
    $_SERVER['PATH_INFO'],
    $_SERVER['REQUEST_METHOD'],
    $_REQUEST
]);

$request->setPath($_SERVER['PATH_INFO']);
$request->setMethod($_SERVER['REQUEST_METHOD']);
$request->setParameters($_REQUEST);

Router::handle($request);