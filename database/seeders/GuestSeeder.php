<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['id_user' => 001],
            [
                'nama' => 'Guest User',
                'email' => 'guest@example.com',
                'password' => Hash::make('123456'),
                'role' => 'guest',
            ]
        );
    }
}
