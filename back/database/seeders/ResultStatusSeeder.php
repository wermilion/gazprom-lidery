<?php

namespace Database\Seeders;

use App\Models\ResultStatus;
use Illuminate\Database\Seeder;

class ResultStatusSeeder extends Seeder
{
    public function run(): void
    {
        $data = ['Пройдено', 'Отклонено', 'На проверке'];
        foreach ($data as $str) {
            ResultStatus::query()->firstOrCreate(['status_name' => $str]);
        }
    }
}
