<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            BranchSeeder::class,
            StageStatusSeeder::class,
            ResultStatusSeeder::class,
            StageSeeder::class,
            InstrumentSeeder::class
        ]);
    }
}
