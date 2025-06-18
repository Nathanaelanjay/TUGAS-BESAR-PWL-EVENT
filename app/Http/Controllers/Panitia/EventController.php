<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show($id_event)
    {
        $event = Event::with('sesi')->findOrFail($id_event);
        return view('panitia.detail_event', compact('event'));
    }
    // Tampilkan form create event
    public function create()
    {
        return view('panitia.event');
    }
    public function index()
    {
        $events = Event::all();
        return view('panitia.dashboard', compact('events')); // atau sesuaikan nama view-nya
    }

    // Simpan data event ke database
    public function store(Request $request)
    {
        // Validasi input sesuai dengan kolom tabel 'events'
        $validated = $request->validate([
            'nama_event'       => 'required|string|max:255',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan_event' => 'required|string',
            'poster_event'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Siapkan data
        $data = [
            'nama_event'       => $validated['nama_event'],
            'tanggal_mulai'    => $validated['tanggal_mulai'],
            'tanggal_selesai'  => $validated['tanggal_selesai'],
            'keterangan_event' => $validated['keterangan_event'],
        ];

        // Upload poster jika ada
        if ($request->hasFile('poster_event')) {
            $path = $request->file('poster_event')->store('posters', 'public');
            $data['poster_event'] = $path;
        }

        // Simpan ke database
        Event::create($data);

        return redirect('/panitia/dashboard')->with('success', 'Event berhasil dibuat!');
    }
}
