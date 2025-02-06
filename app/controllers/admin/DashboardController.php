<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\View;
use App\Core\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur est admin
        if (Session::get('user_role') !== 'admin') {
            $this->redirect('/MVC-Framework/public/login');
        }

        View::render('admin/dashboard/index', [
            'title' => 'Dashboard Admin'
        ]);
    }
} 