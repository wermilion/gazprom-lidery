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
            'desc' => 'Пройти регистрацию',
            'instruction' => 'Зарегистрироваться на сайте Лидеры Газпрома.',
            'image' => '/image/stages/Registration.svg',
            'date_start' => '2023-10-15 12:00',
            'date_end' => '2023-10-31 12:00',
            'stage_status_id' => 1,
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Анкета и видеоинтервью',
            'desc' => "Пройти этап \"Анкета и видеоинтервью\"",
            'instruction' => 'Пройти анкетирование и загрузить видеоинтервью.',
            'image' => '/image/stages/Questionnaire.svg',
            'date_start' => '2023-11-1 12:00',
            'date_end' => '2023-11-15 12:00',
            'stage_status_id' => 2,
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Дистанционный этап',
            'desc' => "Пройти дистанционный этап",
            'instruction' => 'Пройти дистанционные тесты на сайте РСВ.',
            'image' => '/image/stages/Remote.svg',
            'date_start' => '2023-11-16 12:00',
            'date_end' => '2023-11-30 12:00',
            'stage_status_id' => 2,
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Управленческие решения',
            'desc' => "Пройти этап \"Управленческие решения\"",
            'instruction' => 'Описать управленческое решение.',
            'image' => '/image/stages/Management.svg',
            'date_start' => '2023-12-1 12:00',
            'date_end' => '2023-12-24 12:00',
            'stage_status_id' => 2,
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Задача',
            'desc' => "Пройти этап \"Задача\"",
            'instruction' => 'Решить задачу.',
            'image' => '/image/stages/Task.svg',
            'date_start' => '2024-01-7 12:00',
            'date_end' => '2024-01-28 12:00',
            'stage_status_id' => 2,
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Очный этап',
            'desc' => 'Пройти очный этап',
            'instruction' => 'Очный этап будет проходить по адресу....',
            'image' => '/image/stages/InPerson.svg',
            'date_start' => '2024-02-10 12:00',
            'date_end' => '2024-02-10 15:00',
            'stage_status_id' => 2,
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Финал',
            'desc' => 'Успешно завершить все предыдущие этапы',
            'instruction' => 'Финал будет проходить по адресу....',
            'image' => '/image/stages/Final.svg',
            'date_start' => '2024-02-25 12:00',
            'date_end' => '2024-02-25 15:00',
            'stage_status_id' => 2,
        ]);
    }
}
