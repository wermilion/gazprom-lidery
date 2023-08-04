<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    public function run(): void
    {
        Stage::query()->firstOrCreate([
            'name' => 'Регистрация',
            'image' => '/image/stages/Registration.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Анкета и видеоинтервью',
            'image' => '/image/stages/Questionnaire.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Дистанционный этап',
            'image' => '/image/stages/Remote.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Управленческие решения',
            'image' => '/image/stages/Management.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Задача',
            'image' => '/image/stages/Task.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Очный этап',
            'image' => '/image/stages/InPerson.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Финал',
            'image' => '/image/stages/Final.svg',
        ]);
    }
}
