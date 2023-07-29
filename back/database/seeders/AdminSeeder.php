<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate([
            'tabel_number' => '1234',
            'password' => Hash::make('password') /*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/,
            'custom_password' => true,
            'role_id' => 2,
        ]);
    }
}
