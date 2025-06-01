<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\RegistrasiEvent;
use Illuminate\Support\Facades\Auth;

class RegisterEventController extends Controller
{
    public function showForm($id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();
        return view('member.registerevent', compact('event', 'user'));
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        RegistrasiEvent::create([
            'id_user' => Auth::id(),
            'id_event' => $id,
            'tanggal_registrasi' => now(),
            'bukti_pembayaran' => $buktiPath,
            'status_pembayaran' => 1,
        ]);

        return back()->with('success_redirect', 'Registrasi berhasil dikirim.');
    }
}
