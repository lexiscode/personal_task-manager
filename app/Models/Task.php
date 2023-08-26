<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'title', 'description', 'due_date', 'status', 'category'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
