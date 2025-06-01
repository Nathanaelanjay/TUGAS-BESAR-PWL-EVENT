<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\RegistrasiEvent;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    // Tampilkan daftar event ke member
    public function index()
    {
        $events = Event::latest()->get();
        return view('member.dashboard', compact('events'));
    }

    // Tampilkan form registrasi (opsional)
    public function show($id_event)
    {
        $event = Event::findOrFail($id_event);
        return view('member.register', compact('event'));
    }

    // Proses registrasi member ke event
    public function register($id_event)
    {
        $event = Event::findOrFail($id_event);

        // Cek apakah user sudah pernah registrasi event ini
        $sudahRegistrasi = RegistrasiEvent::where('id_event', $id_event)
                            ->where('id_user', Auth::id())
                            ->exists();

        if ($sudahRegistrasi) {
            return redirect()->back()->with('error', 'Kamu sudah terdaftar di event ini.');
        }

        // Simpan data registrasi
        RegistrasiEvent::create([
            'id_user'  => Auth::id(),
            'id_event' => $id_event,
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar pada event!');
    }
}