<?php

namespace Database\Seeders;

use App\Models\Instrument;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    public function run(): void
    {
        Instrument::query()->firstOrCreate([
            'min_points' => '100',
            'task' => '...'
        ]);
    }
}
