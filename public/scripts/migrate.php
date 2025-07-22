<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../app/config/env.php';
require_once __DIR__ . '/../../migrations/migration.php';

try {
    echo "Starting migrations...\n";
    $migration = new CreateTables();
    $migration->up();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}