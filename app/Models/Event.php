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
        'tanggal_event',
        'waktu_event',
        'lokasi',
        'poster_event',
        'biaya',
        'kuota',
        'narasumber',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_event' => 'date',
            'waktu_event' => 'datetime:H:i:s',
            'biaya' => 'decimal:2',
            'created_at' => 'datetime',
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
}
