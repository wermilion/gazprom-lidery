<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('tabel_number');
            $table->string('password');
            $table->boolean('custom_password')->default(false);
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('position')->nullable();
            $table->integer('work_experience')->nullable();
            $table->boolean('check_video')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
