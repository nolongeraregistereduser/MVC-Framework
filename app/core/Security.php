<?php

namespace App\Core;

class Security
{
    // Protection CSRF
    public static function generateCsrfToken(): string
    {
        if (!Session::has('csrf_token')) {
            $token = bin2hex(random_bytes(32));
            Session::set('csrf_token', $token);
        }
        return Session::get('csrf_token');
    }

    public static function validateCsrfToken(?string $token): bool
    {
        if (empty($token) || !Session::has('csrf_token')) {
            return false;
        }
        return hash_equals(Session::get('csrf_token'), $token);
    }

    // Protection XSS fl forms 
    
    public static function escape($data)
    {
        if (is_array($data)) {
            return array_map([self::class, 'escape'], $data);
        }
        if (is_string($data)) {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
        return $data;
    }

    // Protection SQL Injection
    public static function sanitizeInput($data)
    {
        if (is_array($data)) {
            return array_map([self::class, 'sanitizeInput'], $data);
        }
        if (is_string($data)) {
            return trim(strip_tags($data));
        }
        return $data;
    }

    // Validation d'email
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Validation de mot de passe fort
    public static function isStrongPassword(string $password): bool
    {
        // Au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre
        return strlen($password) >= 8 
            && preg_match('/[A-Z]/', $password) 
            && preg_match('/[a-z]/', $password) 
            && preg_match('/[0-9]/', $password);
    }
}
