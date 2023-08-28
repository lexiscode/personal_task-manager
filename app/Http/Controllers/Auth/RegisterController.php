<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client;

class RegisterController extends Controller
{
    /**
     * Displays the registration form page
     */
    public function create()
    {
        return view('register');
    }


    /**
     * Store user inputs into the database
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'min:3', 'max:255', 'unique:clients'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // Create a new user using the validated data
        Client::create([
            'full_name' => $request->input('full_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        // Adds a success message or redirect the user after successful registration
        return redirect()->route('client.signin')->with('success', 'Registration successful!');
    }
}


