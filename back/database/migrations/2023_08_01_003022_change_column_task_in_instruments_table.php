<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('instruments', function (Blueprint $table) {
            $table->string('task')->nullable()->default('Задача для этапа Задача')->change();
        });
    }

    public function down(): void
    {
        Schema::table('instruments', function (Blueprint $table) {
            $table->string('task')->default('Задача для этапа Задача')->change();
        });
    }
};
