<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    const UPDATED_AT = null; 

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Relationships
    public function registrasiEvents()
    {
        return $this->hasMany(RegistrasiEvent::class, 'id_user');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_user');
    }
}
