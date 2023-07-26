<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Instrument;
use App\Models\ResultStatus;
use App\Models\Role;
use App\Models\Stage;
use App\Models\StageStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->truncate();
        DB::table('branches')->truncate();
        DB::table('users')->truncate();
        DB::table('instruments')->truncate();
        DB::table('stage_statuses')->truncate();
        DB::table('stages')->truncate();
        DB::table('result_statuses')->truncate();
        DB::table('results')->truncate();
        DB::table('distances')->truncate();
        DB::table('management_decisions')->truncate();
        DB::table('challenges')->truncate();
        DB::table('results')->truncate();


        Role::factory()->create([
            'name' => 'Конкурстант'
        ]);

        Role::factory()->create([
            'name' => 'Админ'
        ]);

        Branch::factory()->count(14)->create();

        Branch::factory()->create([
            'name' => 'Томск'
        ]);

        User::factory()->count(30)->create([
            'custom_password' => true
        ]);

        User::factory()->create([
            'tabel_number' => '1234',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'role_id' => 2,
        ]);

        User::factory()->create([
            'tabel_number' => '23412',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'name' => 'Василий',
            'surname' => 'Игнатович',
            'branch_id' => 15,
            'work_experience' => 2,
            'position' => 'Менеджер проекта',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'tabel_number' => '51423',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'name' => 'Богдан',
            'surname' => 'Мухатдисов',
            'branch_id' => 15,
            'work_experience' => 1,
            'position' => 'Backend разработчик',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'tabel_number' => '34215',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'name' => 'Карина',
            'surname' => 'Бочарова',
            'branch_id' => 15,
            'work_experience' => 10,
            'position' => 'Аналитик',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'tabel_number' => '23142',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'name' => 'Анна',
            'surname' => 'Шкарбань',
            'branch_id' => 15,
            'work_experience' => 5,
            'position' => 'Аналитик',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'tabel_number' => '12234',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'name' => 'Анастасия',
            'surname' => 'Тарасовец',
            'branch_id' => 15,
            'work_experience' => 2,
            'position' => 'UI/UX дизайнер',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'tabel_number' => '12345',
            'password' => Hash::make('password')/*'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'*/, // password
            'custom_password' => true,
            'name' => 'Вячеслав',
            'surname' => 'Каратаев',
            'branch_id' => 15,
            'work_experience' => 1,
            'position' => 'Frontend разработчик',
            'role_id' => 1,
        ]);

        Instrument::factory()->create([
            'min_points' => 100,
            'task' => 'Описание задачи...',
        ]);

        StageStatus::factory()->create([
            'status_name' => 'Доступно'
        ]);

        StageStatus::factory()->create([
            'status_name' => 'Недоступно'
        ]);

        Stage::factory()->create([
            'name' => 'Регистрация',
            'desc' => fake()->text('200'),
            'instruction' => 'Зарегистрироваться на сайте Лидеры Газпрома.',
            'image' => '/image/stages/Registration.svg',
            'date_start' => '2022-09-28 23:59',
            'date_end' => '2023-09-28 11:59',
            'stage_status_id' => 1,
        ]);

        Stage::factory()->create([
            'name' => 'Анкета и видеоинтервью',
            'desc' => fake()->text('200'),
            'instruction' => 'Пройти анкетирование и загрузить видеоинтервью.',
            'image' => '/image/stages/Questionnaire.svg',
            'date_start' => '2023-09-28 23:59',
            'date_end' => '2024-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        Stage::factory()->create([
            'name' => 'Дистанционный этап',
            'desc' => fake()->text('200'),
            'instruction' => 'Пройти дистанционные тесты на сайте РСВ.',
            'image' => '/image/stages/Remote.svg',
            'date_start' => '2024-09-28 23:59',
            'date_end' => '2025-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        Stage::factory()->create([
            'name' => 'Управленческие решения',
            'desc' => fake()->text('200'),
            'instruction' => 'Описать управленческое решение.',
            'image' => '/image/stages/Management.svg',
            'date_start' => '2025-09-28 23:59',
            'date_end' => '2026-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        Stage::factory()->create([
            'name' => 'Задача',
            'desc' => fake()->text('200'),
            'instruction' => 'Решить задачу.',
            'image' => '/image/stages/Task.svg',
            'date_start' => '2026-09-28 23:59',
            'date_end' => '2027-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        Stage::factory()->create([
            'name' => 'Очный этап',
            'desc' => fake()->text('200'),
            'instruction' => 'Очный этап будет проходить по адресу....',
            'image' => '/image/stages/InPerson.svg',
            'date_start' => '2027-09-28 23:59',
            'date_end' => '2028-09-28 11:59',
            'stage_status_id' => 2,
        ]);

        Stage::factory()->create([
            'name' => 'Финал',
            'desc' => fake()->text('200'),
            'instruction' => 'Финал будет проходить по адресу....',
            'image' => '/image/stages/Final.svg',
            'date_start' => '2028-09-28 23:59',
            'date_end' => '2029-09-28 11:59',
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
