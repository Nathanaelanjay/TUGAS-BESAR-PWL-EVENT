<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Panitia\PanitiaController;
use App\Http\Controllers\Panitia\EventController;
use App\Http\Controllers\Member\DashboardController;



// Redirect root to login
Route::get('/', function () {
    $events = Event::all();
    return view('dashboard', compact('events'));
});

// Optional: unauthorized page
Route::get('/unauthenticated', function () {
    return view('error.unauthenticated');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register', function () {
    return view('auth.register'); // buat file resources/views/auth/register.blade.php
})->name('register');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// Member routes
Route::get('/member/dashboard', function () {
    return view('member.dashboard');
})->middleware('auth');
Route::get('/member/dashboard', function () {
    $events = Event::all();
    return view('/member/dashboard', compact('events'));
});

// Panitia routes
Route::get('/panitia/dashboard', function () {
    return view('panitia.dashboard');
})->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/panitia/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/panitia/events/store', [EventController::class, 'store'])->name('panitia.event.store');
});
Route::get('/panitia/dashboard', function () {
    $events = Event::all();
    return view('/panitia/dashboard', compact('events'));
});
Route::get('/panitia/event', function () {
    return view('panitia.event');
})->name('panitia.events.create')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/panitia/event/store', [EventController::class, 'store'])->name('panitia.event.store');
});

// Admin routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

// Tim Keuangan routes
Route::get('/timkeuangan/dashboard', function () {
    return view('timkeuangan.dashboard');
})->middleware('auth');