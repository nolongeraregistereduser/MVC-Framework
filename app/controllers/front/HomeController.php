<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Test de la connexion à la base de données
        try {
            $users = User::all();
            View::render('front/home/index', [
                'title' => 'Accueil - Mon Framework MVC',
                'users' => $users
            ]);
        } catch (\Exception $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
} 