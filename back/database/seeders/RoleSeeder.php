<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::query()->firstOrCreate(['name' => 'Конкурсант']);
        Role::query()->firstOrCreate(['name' => 'Админ']);
    }
}
