<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Presensi;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\DB;
use App\Models\RegistrasiEvent;

class MemberPresensiController extends Controller
{


    public function scan($token)
    {
        $registrasi = RegistrasiEvent::where('scan_token', $token)->firstOrFail();

        $already = Presensi::where('id_user', $registrasi->id_user)
            ->where('id_event', $registrasi->id_event)
            ->exists();

        if ($already) {
            return response("<h1 style='font-family: sans-serif;'>Anda sudah presensi sebelumnya.</h1>");
        }

        Presensi::create([
            'id_user' => $registrasi->id_user,
            'id_event' => $registrasi->id_event,
            'id_sesi' => null, // atau isi jika sesi tersedia
            'waktu_hadir' => now(),
        ]);

        return response("<h1 style='font-family: sans-serif;'>Presensi berhasil. Terima kasih.</h1>");
    }
    public function index()
    {
        $userId = Auth::id();

        $presensiList = DB::table('presensi')
            ->join('events', 'presensi.id_event', '=', 'events.id_event')
            ->leftJoin('sertifikat', 'presensi.id_presensi', '=', 'sertifikat.id_presensi')
            ->where('presensi.id_user', $userId)
            ->select(
                'events.nama_event',
                'presensi.waktu_hadir',
                'sertifikat.file_sertifikat as sertifikat_path'
            )
            ->get();

        return view('member.presensi', compact('presensiList'));
    }
}
