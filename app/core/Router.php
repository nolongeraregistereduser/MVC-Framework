<?php
namespace App\Core;

class Router {
    private $routes = [];
    private $params = [];
    
    public function add($method, $path, $controller) {
        // Convertir le chemin en expression régulière
        $pattern = preg_replace('/\//', '\\/', $path);
        $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $pattern);
        $pattern = '/^' . $pattern . '$/i';
        
        $this->routes[$method][$pattern] = $controller;
    }
    
    public function dispatch($method, $uri) {
        $uri = trim($uri, '/');
        
        foreach ($this->routes[$method] ?? [] as $pattern => $controller) {
            if (preg_match($pattern, $uri, $matches)) {
                // Extraire les paramètres
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $this->params[$key] = $match;
                    }
                }
                
                // Séparer le contrôleur et la méthode
                list($controller, $action) = explode('@', $controller);
                $controller = "App\\Controllers\\" . $controller;
                
                if (class_exists($controller)) {
                    $controllerObject = new $controller();
                    if (method_exists($controllerObject, $action)) {
                        return $controllerObject->$action($this->params);
                    }
                }
                
                throw new \Exception("Méthode non trouvée");
            }
        }
        
        throw new \Exception("Route non trouvée", 404);
    }
}

// app/core/Controller.php
namespace App\Core;

abstract class Controller {
    protected function render($view, $data = []) {
        // Logique de rendu
    }
}

// app/core/Database.php
namespace App\Core;

class Database {
    public static function init() {
        // Configuration Eloquent
    }
}