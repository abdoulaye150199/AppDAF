<?php

require_once __DIR__ . '/env.php';

function env(string $key, $default = null)
{
    return $_ENV[$key] ?? $default;
}

function config(string $key, $default = null)
{
    static $config = null;
    
    if ($config === null) {
        $config = require __DIR__ . '/config.php';
    }
    
    return $config[$key] ?? $default;
}