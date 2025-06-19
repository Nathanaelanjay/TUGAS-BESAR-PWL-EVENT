<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahPanitia = \App\Models\User::where('role', 'panitia')->count();
        $jumlahMember = \App\Models\User::where('role', 'member')->count();
        $jumlahTimKeuangan = \App\Models\User::where('role', 'tim_keuangan')->count();

        return view('admin.dashboard', compact(
            'jumlahPanitia',
            'jumlahMember',
            'jumlahTimKeuangan'
        ));
    }

    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Menyimpan akun baru
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:tim_keuangan,panitia',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil dibuat.');
    }
}
