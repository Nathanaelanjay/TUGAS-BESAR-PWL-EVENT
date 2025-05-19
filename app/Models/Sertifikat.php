<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';
    public $timestamps = false;

    protected $fillable = [
        'id_presensi',
        'file_sertifikat',
        'uploaded_at',
    ];

    protected function casts(): array
    {
        return [
            'uploaded_at' => 'datetime',
        ];
    }

    // Relationships
    public function presensi()
    {
        return $this->belongsTo(Presensi::class, 'id_presensi');
    }
}
