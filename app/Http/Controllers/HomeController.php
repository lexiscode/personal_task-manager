<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function __invoke()
    {
        return view('home');
    }
}
