<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/bootstrap.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($method, $uri);