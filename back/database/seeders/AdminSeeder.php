<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate([
            'tabel_number' => '00000',
            'password' => Hash::make('Jxv5bf9VHdcOWq4') /*$2y$10$GhQWSLcNV.ahLP8pL0R/MOZRhOwNLihKd7.BhBTxmOljfzP0T8M72*/,
            'role_id' => 2,
        ]);
    }
}
