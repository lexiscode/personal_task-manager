<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

