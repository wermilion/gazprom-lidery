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
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Анкета и видеоинтервью',
            'desc' => "Пройти этап \"Анкета и видеоинтервью\"",
            'instruction' => 'Пройти анкетирование и загрузить видеоинтервью.',
            'image' => '/image/stages/Questionnaire.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Дистанционный этап',
            'desc' => "Пройти дистанционный этап",
            'instruction' => 'Пройти дистанционные тесты на сайте РСВ.',
            'image' => '/image/stages/Remote.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Управленческие решения',
            'desc' => "Пройти этап \"Управленческие решения\"",
            'instruction' => 'Описать управленческое решение.',
            'image' => '/image/stages/Management.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Задача',
            'desc' => "Пройти этап \"Задача\"",
            'instruction' => 'Решить задачу.',
            'image' => '/image/stages/Task.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Очный этап',
            'desc' => 'Пройти очный этап',
            'instruction' => 'Очный этап будет проходить по адресу....',
            'image' => '/image/stages/InPerson.svg',
        ]);
        Stage::query()->firstOrCreate([
            'name' => 'Финал',
            'desc' => 'Успешно завершить все предыдущие этапы',
            'instruction' => 'Финал будет проходить по адресу....',
            'image' => '/image/stages/Final.svg',
        ]);
    }
}
