<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/helpers.php';

use App\Core\App;

App::init();

$router = App::getDependency('router');

$router->get('/api/citoyens/{nci}', ['citoyenController', 'getCitoyen']);

$router->get('/api/health', function() {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'healthy', 'timestamp' => time()]);
});

return $router;