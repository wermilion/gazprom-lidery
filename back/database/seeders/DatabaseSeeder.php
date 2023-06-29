<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\ResultStatus;
use App\Models\Role;
use App\Models\Stage;
use App\Models\StageStatus;
use App\Models\User;
use Database\Factories\BranchFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::factory()->create([
            'name' => 'Конкурстант'
        ]);

        Role::factory()->create([
            'name' => 'Админ'
        ]);

        Branch::factory()->count(14)->create();

        User::factory()->create([
            'tabel_number' => '1234',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'custom_password' => true,
            'role_id' => 2,
        ]);

        User::factory()->count(40)->create();


        StageStatus::factory()->create([
            'status_name' => 'Доступно'
        ]);

        StageStatus::factory()->create([
            'status_name' => 'Недоступно'
        ]);

        Stage::factory()->create([
            'name' => 'Регистрация',
            'instruction' => 'Зарегистрироваться на сайте Лидеры Газпрома.',
            'date_start' => '2022-09-28 23:59',
            'date_end' => '2023-09-28 11:59',
            'stage_status_id' => 1,
        ]);

        Stage::factory()->create([
            'name' => 'Анкета и видеоинтервью',
            'instruction' => 'Пройти анкетирование и загрузить видеоинтервью.',
            'date_start' => '2023-09-28 23:59',
            'date_end' => '2024-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        Stage::factory()->create([
            'name' => 'Дистанционный этап',
            'instruction' => 'Пройти дистанционные тесты на сайте РСВ.',
            'date_start' => '2024-09-28 23:59',
            'date_end' => '2025-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        ResultStatus::factory()->create([
            'status_name' => 'Пройдено'
        ]);

        ResultStatus::factory()->create([
            'status_name' => 'Отклонено'
        ]);

        ResultStatus::factory()->create([
            'status_name' => 'На проверке'
        ]);
    }
}
