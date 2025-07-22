<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../app/config/env.php';
require_once __DIR__ . '/../../seeders/seeder.php';

try {
    echo "Initializing seeder...\n";
    
    $seeder = new DatabaseSeeder();
    $seeder->run();
    
    echo "Seeding completed successfully!\n";
} catch (Exception $e) {
    echo "Error during seeding: " . $e->getMessage() . "\n";
    exit(1);
}