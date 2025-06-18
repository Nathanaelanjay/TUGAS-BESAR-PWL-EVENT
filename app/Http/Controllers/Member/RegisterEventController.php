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

        try {
        // Simpan data ke database
        $registrasi = new RegistrasiEvent;
        $registrasi->id_user = Auth::id();
        $registrasi->id_event = $id_event;
        $registrasi->nama_lengkap = $request->nama_lengkap;
        $registrasi->email = $request->email;
        $registrasi->nomor_telepon = $request->nomor_telepon;
        $registrasi->instansi = $request->instansi;
        $registrasi->pekerjaan = $request->pekerjaan;
        $registrasi->alamat = $request->alamat;
        $registrasi->tanggal_registrasi = now();
        $registrasi->status_pembayaran = 1; // default: sudah bayar/aktif (sesuaikan kebutuhan)

        $registrasi->save();

        return redirect()->route('member.dashboard')->with('success', 'Registrasi berhasil!');
    } catch (\Exception $e) {
        // Log error ke laravel.log jika perlu: Log::error($e->getMessage());
        return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
    }
    }
}
