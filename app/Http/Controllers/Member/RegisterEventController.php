<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\RegistrasiEvent;
use Illuminate\Support\Facades\Auth;

class RegisterEventController extends Controller
{
    /**
     * Tampilkan form registrasi event.
     */
    public function showForm($id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();
        return view('member.registerevent', compact('event', 'user'));
    }

    /**
     * Proses submit form registrasi event.
     */
    public function submit(Request $request, $id_event)
    {
        $request->validate([
            'nama_lengkap'    => 'required|string|max:100',
            'email'           => 'required|email|max:100',
            'nomor_telepon'   => 'required|string|max:20',
            'instansi'        => 'required|string|max:100',
            'pekerjaan'       => 'required|string|max:50',
            'alamat'          => 'required|string|max:255',
        ]);

        // Cek apakah user sudah mendaftar event ini
        if (RegistrasiEvent::where('id_user', Auth::id())->where('id_event', $id_event)->exists()) {
            return redirect()->route('member.dashboard')->with('error', 'Kamu sudah mendaftar event ini.');
        }

        // Simpan registrasi
        RegistrasiEvent::create([
            'id_user'             => Auth::id(),
            'id_event'            => $id_event,
            'nama_lengkap'        => $request->nama_lengkap,
            'email'               => $request->email,
            'nomor_telepon'       => $request->nomor_telepon,
            'instansi'            => $request->instansi,
            'pekerjaan'           => $request->pekerjaan,
            'alamat'              => $request->alamat,
            'tanggal_registrasi'  => now(),
            'status_pembayaran'   => 1, // default: belum bayar
        ]);

        return redirect()->route('member.dashboard')->with('success', 'Registrasi berhasil. Silakan cek status pembayaran di dashboard.');
    }
}
