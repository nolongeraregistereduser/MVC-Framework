<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel
{
    protected $guarded = ['id'];
}
