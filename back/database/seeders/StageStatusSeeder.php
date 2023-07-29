<?php

namespace Database\Seeders;

use App\Models\StageStatus;
use Illuminate\Database\Seeder;

class StageStatusSeeder extends Seeder
{
    public function run(): void
    {
        StageStatus::query()->firstOrCreate(['status_name' => 'Доступно']);
        StageStatus::query()->firstOrCreate(['status_name' => 'Недоступно']);
    }
}
