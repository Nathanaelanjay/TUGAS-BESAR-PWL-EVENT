<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TimKeuanganSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['id_user' => 004],
            [
                'nama' => 'Tim Keuangan',
                'email' => 'keuangan@example.com',
                'password' => Hash::make('123456'),
                'role' => 'tim_keuangan',
            ]
        );
    }
}
