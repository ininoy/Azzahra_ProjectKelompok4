<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin Default
        User::updateOrCreate(
            ['email' => 'admin@azzahra.com'],
            [
                'name' => 'Admin Azzahra',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // Akun Pelanggan Contoh
        User::updateOrCreate(
            ['email' => 'pelanggan@azzahra.com'],
            [
                'name' => 'Nola Pelanggan',
                'password' => Hash::make('pelanggan123'),
                'role' => 'pelanggan',
            ]
        );
    }
}
