<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientController extends Controller
{
    /**
     * Allows users to sign up
     */
    public function signup()
    {
        return view('signup');
    }

    /**
     * Allows users to sign in
     */
    public function signin()
    {
        return view('signin');
    }
}

