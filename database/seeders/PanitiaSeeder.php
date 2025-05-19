<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PanitiaSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['id_user' => 003],
            [
                'nama' => 'Panitia Event',
                'email' => 'panitia@example.com',
                'password' => Hash::make('123456'),
                'role' => 'panitia',
            ]
        );
    }
}
