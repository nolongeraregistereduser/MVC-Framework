<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    // Désactiver les timestamps
    public $timestamps = false;

    // Définir la valeur par défaut pour le rôle
    protected $attributes = [
        'role' => 'user'
    ];

    protected $hidden = [
        'password'
    ];
} 