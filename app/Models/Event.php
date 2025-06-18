<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'id_event';
    public $timestamps = false;

    protected $fillable = [
        'nama_event',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan_event',
        'poster_event',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }

    // Relationships
    public function registrasiEvents()
    {
        return $this->hasMany(RegistrasiEvent::class, 'id_event');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_event');
    }

    public function sesi()
    {
        return $this->hasMany(Sesi::class, 'id_event');
    }
}
