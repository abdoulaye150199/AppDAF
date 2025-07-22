<?php

namespace App\Core;

use App\Core\App;
use App\Core\JsonResponse;

class Router
{
    private array $routes = [];

    public function get(string $path, array|callable $handler): void
    {
        // Convert path parameters to regex pattern
        $pattern = preg_replace('/\{([^}]+)\}/', '(?P<$1>[^/]+)', $path);
        $this->routes['GET'][$pattern] = [
            'handler' => $handler,
            'path' => $path
        ];
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        foreach ($this->routes[$method] ?? [] as $pattern => $route) {
            $pattern = '#^' . $pattern . '$#';
            if (preg_match($pattern, $uri, $matches)) {
                $handler = $route['handler'];
                
                // Remove numeric keys
                $params = array_filter($matches, function ($key) {
                    return !is_numeric($key);
                }, ARRAY_FILTER_USE_KEY);

                if (is_array($handler)) {
                    [$controllerClass, $method] = $handler;
                    $controller = is_string($controllerClass) ? 
                        App::getDependency($controllerClass) : 
                        $controllerClass;
                    $controller->$method(...array_values($params));
                } else {
                    $handler(...array_values($params));
                }
                return;
            }
        }

        JsonResponse::error('Route not found', 404);
    }
}