<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Core\View;
use App\Core\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Session::has('user_id')) {
            $this->redirect('/MVC-Framework/public/login');
        }

        View::render('user/dashboard/index', [
            'title' => 'Dashboard Utilisateur'
        ]);
    }
} 