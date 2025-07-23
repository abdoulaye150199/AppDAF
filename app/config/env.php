<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASSWORD']);
define('PUBLIC_KEY',$_ENV['PUBLIC_KEY']);
define('PRIVATE_KEY',$_ENV['PRIVATE_KEY']);
define('CLOUD_NAME',$_ENV['CLOUD_NAME']);



