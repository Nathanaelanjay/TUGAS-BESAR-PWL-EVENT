<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $table = 'sesi';
    protected $primaryKey = 'id_sesi';
    public $timestamps = false;

    protected $fillable = [
        'id_event',
        'nama_sesi',
        'tanggal_sesi',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi_sesi',
        'narasumber_sesi',
        'kuota_sesi',
        'harga_sesi',
        'sesi',
    ];

    protected $casts = [
        'tanggal_sesi' => 'date',
        'waktu_mulai' => 'datetime:H:i:s',
        'waktu_selesai' => 'datetime:H:i:s',
        'harga_sesi' => 'decimal:2',
    ];

    // Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    // Relasi ke Presensi
    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_sesi');
    }
}
