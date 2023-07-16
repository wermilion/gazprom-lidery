<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('management_decisions', function (Blueprint $table) {
            $table->boolean('check_file')->default(false)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('management_decisions', function (Blueprint $table) {
            $table->boolean('check_file')->nullable()->change();
        });
    }
};
