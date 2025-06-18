<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($credentials['username'] === 'admin' && $credentials['password'] === 'root') {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        return back()->with('error', 'Invalid credentials');
    }
}
