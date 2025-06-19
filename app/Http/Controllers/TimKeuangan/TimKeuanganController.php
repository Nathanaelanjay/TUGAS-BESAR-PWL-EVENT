<?php

namespace App\Http\Controllers\TimKeuangan;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\RegistrasiEvent;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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

        // Generate token jika belum ada
        if (!$registrasi->scan_token) {
            $registrasi->scan_token = Str::uuid();
        }

        $qrData = url('/presensi/scan/' . $registrasi->scan_token);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrData)
            ->encoding(new Encoding('UTF-8'))
            ->size(300)
            ->margin(10)
            ->build();

        $filename = 'qrcodes/qr_' . $registrasi->id . '.png';
        Storage::disk('public')->put($filename, $result->getString());

        $registrasi->qr_code_path = $filename;
        $registrasi->save();

        return back()->with('success', 'Status pembayaran berhasil diperbarui menjadi Lunas dan QR code dibuat.');
    }
    
    public function tolakPembayaran($id)
    {
        $data = RegistrasiEvent::findOrFail($id);
        $data->status_pembayaran = 3;
        $data->save();

        return back()->with('success', 'Pembayaran ditolak.');
    }
}
