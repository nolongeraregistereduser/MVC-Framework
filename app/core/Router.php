<?php

namespace App\Core;

class Router
{
    private static array $routes = [];
    
    public static function add(string $method, string $path, array $controller)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller
        ];
    }
    
    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Enlever le chemin de base pour Laragon
        $uri = str_replace('/MVC-Framework/public', '', $uri);
        if (empty($uri)) {
            $uri = '/';
        }
        
        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                [$controller, $action] = $route['controller'];
                $controllerInstance = new $controller();
                return $controllerInstance->$action();
            }
        }
        
        // Route non trouvée
        header("HTTP/1.0 404 Not Found");
        echo "404 - Page non trouvée";
    }
}
