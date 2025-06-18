<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistrasiEvent extends Model
{
    use HasFactory;

    protected $table = 'registrasi_event';
    protected $primaryKey = 'id_registrasi';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_event',
        'tanggal_registrasi',
        'status_pembayaran',
        'qr_code_path',
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'instansi',
        'pekerjaan',
        'alamat',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_registrasi' => 'datetime',
            'status_pembayaran' => 'integer',
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
