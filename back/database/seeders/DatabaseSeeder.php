<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('roles')->truncate();
        \DB::table('users')->truncate();
        \DB::table('branches')->truncate();
        \DB::table('stage_statuses')->truncate();
        \DB::table('result_statuses')->truncate();
        \DB::table('stages')->truncate();
        \DB::table('instruments')->truncate();
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
