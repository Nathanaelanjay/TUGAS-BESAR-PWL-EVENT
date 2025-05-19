<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['id_user' => 002],
            [
                'nama' => 'Member Kampus',
                'email' => 'member@example.com',
                'password' => Hash::make('123456'),
                'role' => 'member',
            ]
        );
    }
}
