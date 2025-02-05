<?php
namespace App\Core;

class Router {
    private $routes = [];
    

    public function add($method, $path, $controller) {
        $this->routes[$method][$path] = $controller;
    }
    
    public function dispatch($method, $uri) {
        // Logique de routage
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