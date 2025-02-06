<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'username',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];
} 