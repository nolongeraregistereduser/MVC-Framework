<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;
use App\Core\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        View::render('front/auth/register', [
            'title' => 'Inscription'
        ]);
    }

    public function register()
    {
        // Récupérer les données du formulaire
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Hash du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Créer l'utilisateur
            User::create([
                'email' => $email,
                'password' => $hashedPassword
            ]);

            // Rediriger vers la page de connexion
            $this->redirect('/MVC-Framework/public/');
        } catch (\Exception $e) {
            // Afficher l'erreur réelle pour le débogage
            View::render('front/auth/register', [
                'title' => 'Inscription',
                'error' => 'Erreur: ' . $e->getMessage()
            ]);
        }
    }

    public function showLogin()
    {
        View::render('front/auth/login', [
            'title' => 'Connexion'
        ]);
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        try {
            $user = User::where('email', $email)->first();

            if ($user && password_verify($password, $user->password)) {
                // Stocker les informations de l'utilisateur en session
                Session::set('user_id', $user->id);
                Session::set('user_role', $user->role);
                Session::set('user_email', $user->email);

                // Redirection selon le rôle
                if ($user->role === 'admin') {
                    $this->redirect('/MVC-Framework/public/admin/dashboard');
                } else {
                    $this->redirect('/MVC-Framework/public/user/dashboard');
                }
            } else {
                View::render('front/auth/login', [
                    'title' => 'Connexion',
                    'error' => 'Email ou mot de passe incorrect'
                ]);
            }
        } catch (\Exception $e) {
            View::render('front/auth/login', [
                'title' => 'Connexion',
                'error' => 'Erreur: ' . $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        Session::destroy();
        $this->redirect('/MVC-Framework/public/');
    }
} 