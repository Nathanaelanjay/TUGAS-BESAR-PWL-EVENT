<?php

namespace App\Http\Controllers\Guest;

// Pastikan ini menggunakan Controller yang benar
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function event()
    {
        return view('guest.event');
    }

    public function registrasi()
    {
        return view('guest.registrasi');
    }
}
