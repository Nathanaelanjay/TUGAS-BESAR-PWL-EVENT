<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login attempt
    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Authentication successful, redirect based on role
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'guest':
                    return redirect('/dashboard');
                case 'member':
                    return redirect('/member/dashboard');
                case 'tim_keuangan':
                    return redirect('/timkeuangan/dashboard');
                case 'panitia':
                    return redirect('/panitia/dashboard');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors([
                        'email' => 'Role tidak dikenali.',
                    ]);
            }
        }

        // Authentication failed, redirect back with error
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password salah.',
            ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}