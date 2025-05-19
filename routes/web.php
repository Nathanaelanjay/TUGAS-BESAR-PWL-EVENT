<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\PanitiaController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Optional: unauthorized page
Route::get('/unauthenticated', function () {
    return view('error.unauthenticated');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard routes (basic placeholder views)
Route::get('/guest/dashboard', function () {
    return view('guest.dashboard');
})->middleware('auth');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/panitia/dashboard', function () {
    return view('panitia.dashboard');
})->middleware('auth');

Route::get('/timkeuangan/dashboard', function () {
    return view('timkeuangan.dashboard');
})->middleware('auth');

Route::get('/member/dashboard', function () {
    return view('member.dashboard');
})->middleware('auth');

// Guest routes
Route::middleware(['auth'])->group(function () {
    Route::get('/event', [GuestController::class, 'event'])->name('guest.event');
    Route::get('/registrasi', [GuestController::class, 'registrasi'])->name('guest.registrasi');
});



