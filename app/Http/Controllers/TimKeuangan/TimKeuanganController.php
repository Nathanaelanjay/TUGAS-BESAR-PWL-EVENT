<?php

namespace App\Http\Controllers\TimKeuangan;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\RegistrasiEvent;

class TimKeuanganController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('timkeuangan.dashboard', compact('events'));
    }

    public function showRegistrasi($id)
    {
        $event = Event::findOrFail($id);
        $registrasi = RegistrasiEvent::with('user')->where('id_event', $id)->get();

        return view('timkeuangan.registrasi', compact('event', 'registrasi'));
    }

    public function accPembayaran($id)
    {
        $registrasi = RegistrasiEvent::findOrFail($id);
        $registrasi->status_pembayaran = 2;
        $registrasi->save();

        return back()->with('success', 'Status pembayaran berhasil diperbarui menjadi Lunas.');
    }

    public function tolakPembayaran($id)
    {
        $data = RegistrasiEvent::findOrFail($id);
        $data->status_pembayaran = 3;
        $data->save();

        return back()->with('success', 'Pembayaran ditolak.');
    }
}
