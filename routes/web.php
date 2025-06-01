<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Panitia\PanitiaController;
use App\Http\Controllers\Panitia\EventController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\RegisterEventController;
use App\Http\Controllers\TimKeuangan\TimKeuanganController;


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
Route::get('/member/events/{id}/register', [MemberController::class, 'register'])->name('member.events.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/member/registerevent/{id}', [RegisterEventController::class, 'showForm'])->name('registerevent.form');
    Route::post('/member/registerevent/{id}', [RegisterEventController::class, 'submit'])->name('registerevent.submit');
});
Route::get('/member/dashboard', [DashboardController::class, 'index'])->name('member.dashboard');


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
Route::get('/timkeuangan/dashboard', [TimKeuanganController::class, 'index'])
    ->name('timkeuangan.dashboard');
Route::get('/timkeuangan/registrasi/{id}', [TimKeuanganController::class, 'showRegistrasi'])
    ->name('timkeuangan.registrasi');
Route::post('/timkeuangan/registrasi/acc/{id}', [TimKeuanganController::class, 'accPembayaran'])->name('timkeuangan.accPembayaran');
Route::post('/timkeuangan/registrasi/tolak/{id}', [TimKeuanganController::class, 'tolakPembayaran'])->name('timkeuangan.tolakPembayaran');
