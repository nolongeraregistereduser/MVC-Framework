<?php

namespace App\Core;

class ACL
{
    // Définir les permissions pour chaque rôle
    private static array $permissions = [
        'admin' => [
            'dashboard' => ['view', 'edit'],
            'articles' => ['view', 'create', 'edit', 'delete'],
            'users' => ['view', 'create', 'edit', 'delete'],
            'settings' => ['view', 'edit']
        ],
        'user' => [
            'articles' => ['view', 'create'],
            'profile' => ['view', 'edit']
        ]
    ];

    // Vérifier si un rôle a une permission spécifique
    public static function hasPermission(string $role, string $resource, string $action): bool
    {
        if (!isset(self::$permissions[$role])) {
            return false;
        }

        if (!isset(self::$permissions[$role][$resource])) {
            return false;
        }

        return in_array($action, self::$permissions[$role][$resource]);
    }

    // Vérifier la permission pour l'utilisateur actuel
    public static function check(string $resource, string $action): bool
    {
        if (!Session::has('user_role')) {
            return false;
        }

        $role = Session::get('user_role');
        return self::hasPermission($role, $resource, $action);
    }
} 