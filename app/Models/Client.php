<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    protected $fillable = ['full_name', 'username', 'email', 'password'];
}

