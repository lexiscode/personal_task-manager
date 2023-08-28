<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Displays the login page
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Authenticate or verify user during login
     */
    public function verify(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            // Clear any previous login error messages
            Session::forget('login_error');

            // Regenerate session ID for security
            $request->session()->regenerate();

            // Redirect to the home page with success message
            return redirect()->route('task.create')->with('success', 'You are now logged in!');
        } else {
            // Store login error message in session
            Session::put('login_error', 'Invalid credentials');

            return redirect()->back()->onlyInput('email');
        }
    }
}

