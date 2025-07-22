<?php

namespace App\Core;

use Symfony\Component\Yaml\Yaml;

class App
{
    private static array $container = [];
    private static array $instances = [];

    public static function init(): void
    {
        // Charger les services depuis services.yml
        $services = Yaml::parseFile(__DIR__ . '/../config/services.yml');

        foreach ($services['services'] as $id => $service) {
            self::register($id, function() use ($service) {
                if (isset($service['factory'])) {
                    return $service['class']::{$service['factory']}();
                }

                $args = [];
                if (isset($service['arguments'])) {
                    foreach ($service['arguments'] as $arg) {
                        if (is_string($arg) && str_starts_with($arg, '@')) {
                            $dependencyId = substr($arg, 1);
                            $args[] = self::getDependency($dependencyId);
                        } else {
                            $args[] = $arg;
                        }
                    }
                }

                return new $service['class'](...$args);
            });
        }
    }

    public static function register(string $key, callable $resolver): void
    {
        self::$container[$key] = $resolver;
    }

    public static function getDependency(string $key): mixed
    {
        if (!isset(self::$container[$key])) {
            throw new \RuntimeException("No dependency registered for key: $key");
        }

        if (isset(self::$instances[$key])) {
            return self::$instances[$key];
        }

        $resolver = self::$container[$key];
        $instance = $resolver();
        
        self::$instances[$key] = $instance;
        return $instance;
    }
}