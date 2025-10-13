<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void
    {
        User::create([
            'name' => 'Budi Mahasiswa',
            'email' => 'mahasiswa@test.com',
            'password_hash' => Hash::make('password'),
            'role_id' => 1,
        ]);
    }
}

