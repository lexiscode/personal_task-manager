<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class RegisterController extends Controller
{
    /**
     * Allows users to sign up
     */
    public function signup()
    {
        return view('register');
    }
}
