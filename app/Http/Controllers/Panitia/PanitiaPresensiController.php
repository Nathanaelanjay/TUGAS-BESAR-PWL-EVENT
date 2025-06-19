<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sertifikat;

class PanitiaPresensiController extends Controller
{
    public function index()
    {
        $presensiList = DB::table('presensi')
            ->join('users', 'presensi.id_user', '=', 'users.id_user')
            ->join('events', 'presensi.id_event', '=', 'events.id_event')
            ->leftJoin('sertifikat', 'presensi.id_presensi', '=', 'sertifikat.id_presensi')
            ->select(
                'presensi.id_presensi',
                'users.nama as nama_peserta',
                'events.nama_event',
                'presensi.waktu_hadir',
                'sertifikat.file_sertifikat'
            )
            ->get();

        return view('panitia.presensi', compact('presensiList'));
    }

    public function uploadSertifikat(Request $request, $id_presensi)
    {
        $request->validate([
            'file_sertifikat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('file_sertifikat')->store('sertifikat', 'public');

        Sertifikat::updateOrCreate(
            ['id_presensi' => $id_presensi],
            ['file_sertifikat' => $path, 'uploaded_at' => now()]
        );

        return back()->with('success', 'Sertifikat berhasil diupload.');
    }
}
