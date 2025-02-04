<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Initialize Database
new App\Core\Database();

// Initialize Router
$router = new App\Core\Router();

// Define Routes
$router->get('/', function() {
    return 'Hello World!';
});

// Resolve Route
echo $router->resolve();