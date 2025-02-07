<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\View;
use App\Core\Session;
use App\Core\ACL;

class DashboardController extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur a la permission de voir le dashboard
        if (!ACL::check('dashboard', 'view')) {
            View::render('errors/403', [
                'title' => 'Accès refusé',
                'error' => 'Vous n\'avez pas accès à cette page'
            ]);
            return;
        }

        View::render('admin/dashboard/index', [
            'title' => 'Dashboard Admin'
        ]);
    }
} 