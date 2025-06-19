<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistrasiEvent;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class MemberEventController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        // Ambil event yang sudah didaftarkan oleh user
        $events = RegistrasiEvent::where('id_user', $userId)
            ->join('events', 'registrasi_event.id_event', '=', 'events.id_event')
            ->select(
        'events.id_event',
        'events.nama_event',
        'events.poster_event',
        'events.tanggal_mulai',
        'events.tanggal_selesai',
        'events.keterangan_event',
        'registrasi_event.bukti_pembayaran',
        'registrasi_event.qr_code_path'
    )
            ->get();

        return view('member.events', compact('events'));
    }

    public function deleteBukti($id_event)
    {
        DB::table('registrasi_event')
            ->where('id_event', $id_event)
            ->where('id_user', auth()->id())
            ->update(['bukti_pembayaran' => null]);

        return back()->with('success', 'Bukti pembayaran berhasil dihapus.');
    }

    public function show($id_event)
    {
        $event = Event::findOrFail($id_event);
        return view('member.events', compact('events'));
    }

    public function uploadBukti(Request $request, $id_event)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        DB::table('registrasi_event')
            ->where('id_event', $id_event)
            ->where('id_user', auth()->id())
            ->update(['bukti_pembayaran' => $path]);

        return back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }

}
