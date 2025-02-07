<?php

require_once __DIR__ . '../vendor/autoload.php';

// if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
//     die("Autoloader khdam");
// }


// Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Activer l'affichage des erreurs en développement
if ($_ENV['APP_ENV'] === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}


use App\Core\Database;


// Initialiser la base de données
new Database();



// Démarrer la session
// App\Core\Session::start();

// Charger les routes
require_once __DIR__ . '/../config/routes.php';

// Dispatcher les routes
App\Core\Router::dispatch();







