<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Category;
use App\Models\Task;

class Client extends Authenticatable
{
    protected $fillable = ['full_name', 'username', 'email', 'password'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}

