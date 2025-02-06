<?php

use App\Controllers\Front\HomeController;
use App\Controllers\Front\ContactController;
use App\Core\Router;

// Routes Front Office
Router::add('GET', '/', [HomeController::class, 'index']);
Router::add('GET', '/contact', [ContactController::class, 'index']);

