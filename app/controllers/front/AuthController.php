<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\View;
use App\Core\Session;
use App\Core\Security;
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
            $this->redirect('/MVC-Framework/');
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
        // Vérifier le CSRF token
        if (!Security::validateCsrfToken($_POST['csrf_token'] ?? null)) {
            View::render('front/auth/login', [
                'title' => 'Connexion',
                'error' => 'Token de sécurité invalide'
            ]);
            return;
        }

        // Sanitize et valider les entrées
        $email = Security::sanitizeInput($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Valider l'email
        if (!Security::validateEmail($email)) {
            View::render('front/auth/login', [
                'title' => 'Connexion',
                'error' => 'Format d\'email invalide'
            ]);
            return;
        }

        try {
            $user = User::where('email', $email)->first();

            if ($user && password_verify($password, $user->password)) {
                // Stocker les informations de l'utilisateur en session
                Session::set('user_id', $user->id);
                Session::set('user_role', $user->role);
                Session::set('user_email', $user->email);

                // Redirection selon le rôle
                if ($user->role === 'admin') {
                    $this->redirect('/admin/dashboard');
                } else {
                    $this->redirect('/user/dashboard');
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
                'error' => 'Une erreur est survenue'
            ]);
        }
    }

    public function logout()
    {
        Session::destroy();
        $this->redirect('/');
    }
} 