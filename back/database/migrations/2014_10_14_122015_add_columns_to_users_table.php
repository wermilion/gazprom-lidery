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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('tabel_number');
            $table->boolean('custom_password')->default(false);
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('position')->nullable();
            $table->integer('work_experience')->nullable();
            $table->boolean('check_video')->nullable();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tabel_number');
            $table->dropColumn('custom_password');
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->dropColumn('position');
            $table->dropColumn('work_experience');
            $table->dropColumn('check_video');
            $table->dropSoftDeletes();
        });
    }
};
