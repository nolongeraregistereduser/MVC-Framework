<?php

use App\Controllers\Front\HomeController;
use App\Controllers\Front\ContactController;
use App\Controllers\Front\AuthController;
use App\Controllers\Admin\DashboardController as AdminDashboard;
use App\Controllers\User\DashboardController as UserDashboard;
use App\Core\Router;

// Routes Front Office
Router::add('GET', '/', [HomeController::class, 'index']);
Router::add('GET', '/contact', [ContactController::class, 'index']);

// Routes Authentication
Router::add('GET', '/register', [AuthController::class, 'showRegister']);
Router::add('POST', '/register', [AuthController::class, 'register']);
Router::add('GET', '/login', [AuthController::class, 'showLogin']);
Router::add('POST', '/login', [AuthController::class, 'login']);
Router::add('GET', '/logout', [AuthController::class, 'logout']);

// Routes Dashboard
Router::add('GET', '/admin/dashboard', [AdminDashboard::class, 'index']);
Router::add('GET', '/user/dashboard', [UserDashboard::class, 'index']);

