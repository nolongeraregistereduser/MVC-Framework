<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;

class HomeController extends Controller
{
    public function index()
    {
        View::render('front/home/index', [
            'title' => 'Accueil - Mon Framework MVC'
        ]);
    }
} 