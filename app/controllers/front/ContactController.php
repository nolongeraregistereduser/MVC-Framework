<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;

class ContactController extends Controller
{
    public function index()
    {
        View::render('front/contact/index', [
            'title' => 'Contact - Mon Framework'
        ]);
    }
} 