<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class LoginController extends Controller
{
    /**
     * Allows users to sign in
     */
    public function signin()
    {
        return view('login');
    }
}
