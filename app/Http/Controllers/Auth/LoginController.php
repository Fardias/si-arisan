<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', 'admin@example.com')->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Simpan login ke session manual
            session()->put('is_logged_in', true);
            session()->put('user_id', $user->id);
            session()->put('name', $user->name);

            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        }

        return back()->withInput()->with('error', 'Email atau password salah');
    }
}
