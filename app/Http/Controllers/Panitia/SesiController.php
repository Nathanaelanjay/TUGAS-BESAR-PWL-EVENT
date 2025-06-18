<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sesi;
use App\Models\Event;

class SesiController extends Controller
{
    public function create($id_event)
    {
        $event = Event::findOrFail($id_event);
        return view('panitia.sesi', compact('event'));
    }

    public function destroy($id)
    {
        $sesi = Sesi::findOrFail($id);
        $id_event = $sesi->id_event;
        $sesi->delete();

        return redirect()->route('panitia.event.detail', ['id_event' => $id_event])
            ->with('success', 'Sesi berhasil dihapus.');
    }

    public function store(Request $request, $id_event)
    {
        $request->validate([
            'nama_sesi' => 'required|string|max:150',
            'tanggal_sesi' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi_sesi' => 'required|string|max:255',
            'narasumber_sesi' => 'nullable|string|max:255',
            'kuota_sesi' => 'nullable|integer|min:1',
            'harga_sesi' => 'nullable|numeric|min:0',
            'sesi' => 'nullable|integer'
        ]);

        // Simpan ke database dan simpan hasilnya ke variabel
        $sesi = Sesi::create([
            'id_event' => $id_event,
            'nama_sesi' => $request->nama_sesi,
            'tanggal_sesi' => $request->tanggal_sesi,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lokasi_sesi' => $request->lokasi_sesi,
            'narasumber_sesi' => $request->narasumber_sesi,
            'kuota_sesi' => $request->kuota_sesi,
            'harga_sesi' => $request->harga_sesi,
            'sesi' => $request->sesi,
        ]);

        return redirect()->route('panitia.detail_event', ['id_event' => $sesi->id_event])
            ->with('success', 'Sesi berhasil ditambahkan');
    }
}