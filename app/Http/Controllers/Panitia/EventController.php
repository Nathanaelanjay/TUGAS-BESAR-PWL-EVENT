<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Tampilkan form create event
    public function create()
    {
        return view('panitia.create_event');
    }

    // Simpan data event ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_event'     => 'required|string|max:255',
            'tanggal_event'  => 'required|date',
            'waktu_event'    => 'required',
            'lokasi'         => 'required|string|max:255',
            'narasumber'     => 'required|string|max:255',
            'biaya'          => 'required|integer|min:0',
            'kuota'          => 'required|integer|min:1',
            'poster_event'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Jika ada file poster diunggah, simpan ke storage
        if ($request->hasFile('poster_event')) {
            $path = $request->file('poster_event')->store('posters', 'public');
            $validated['poster_event'] = $path;
        }

        // Simpan event ke database
        Event::create($validated);

        return redirect('/panitia/dashboard')->with('success', 'Event berhasil dibuat!');
    }
}
