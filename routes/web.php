<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Panitia\PanitiaController;
use App\Http\Controllers\Panitia\EventController;
use App\Http\Controllers\Panitia\SesiController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\RegisterEventController;
use App\Http\Controllers\Member\MemberEventController;
use App\Http\Controllers\Member\MemberPresensiController;
use App\Http\Controllers\TimKeuangan\TimKeuanganController;
use App\Http\Controllers\Admin\AdminController;


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
Route::post('/member/event/{id_event}/submit', [RegisterEventController::class, 'submit'])->name('member.register.submit');
Route::post('/member/event/{id}/submit', [RegisterEventController::class, 'submit'])->name('member.register.submit');
Route::get('/member/events', [MemberEventController::class, 'index'])->name('member.events.index');

Route::get('/member/events', [MemberEventController::class, 'index']);
Route::get('/member/event/{id_event}', [MemberEventController::class, 'show'])
    ->name('member.event.detail');
Route::get('/member/events', [MemberEventController::class, 'index'])->name('member.events.index');
Route::post('/member/event/{id_event}/upload-bukti', [MemberEventController::class, 'uploadBukti'])->name('member.event.upload_bukti');
Route::post('/member/event/{id_event}/upload-bukti', [MemberEventController::class, 'uploadBukti'])->name('member.event.upload_bukti');
Route::delete('/member/event/{id_event}/delete-bukti', [MemberEventController::class, 'deleteBukti'])->name('member.event.delete_bukti');
Route::middleware(['auth'])->prefix('member')->name('member.')->group(function () {
    Route::get('/presensi', [MemberPresensiController::class, 'index'])->name('presensi.index');
});
Route::get('/presensi/scan/{token}', [MemberPresensiController::class, 'scan'])->name('presensi.scan');


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
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::prefix('panitia')->middleware(['auth'])->group(function () {
    Route::get('/event/create', [EventController::class, 'create'])->name('panitia.event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('panitia.event.store');
});
Route::get('/panitia/event/{id_event}/sesi/create', [SesiController::class, 'create'])->name('panitia.sesi.create');
Route::post('/panitia/event/{id_event}/sesi/store', [SesiController::class, 'store'])->name('panitia.sesi.store');
Route::get('/panitia/dashboard', [EventController::class, 'index'])->name('panitia.dashboard');
Route::get('/panitia/event/{id_event}/detail', [EventController::class, 'show'])->name('panitia.event.detail');
Route::get('/panitia/sesi/{id_sesi}/edit', [SesiController::class, 'edit'])->name('panitia.sesi.edit');
Route::delete('/panitia/sesi/{id_sesi}/delete', [SesiController::class, 'destroy'])->name('panitia.sesi.destroy');
Route::get('/panitia/event', [EventController::class, 'index'])->name('panitia.event.index');
Route::get('/panitia/event', [EventController::class, 'index'])->name('panitia.event.index');
Route::prefix('panitia')->name('panitia.')->group(function () {
    Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');

    // create event
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');

    // simpan event
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');

    // detail event
    Route::get('/event/{id_event}', [EventController::class, 'show'])->name('event.detail');
});
Route::get('/panitia/event/{id_event}', [EventController::class, 'show'])->name('panitia.detail_event');
Route::prefix('panitia')->middleware('auth')->group(function () {
    Route::get('/presensi', [\App\Http\Controllers\Panitia\PanitiaPresensiController::class, 'index'])->name('panitia.presensi.index');
    Route::post('/presensi/{id_presensi}/upload-sertifikat', [\App\Http\Controllers\Panitia\PanitiaPresensiController::class, 'uploadSertifikat'])->name('panitia.presensi.upload');
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
Route::get('/timkeuangan/registrasi', [TimKeuanganController::class, 'index'])->name('timkeuangan.registrasi.index');

Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.showRegisterForm');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');