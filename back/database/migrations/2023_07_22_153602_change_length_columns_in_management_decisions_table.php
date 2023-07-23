<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('management_decisions', function (Blueprint $table) {
            $table->string('problem', 1000)->change();
            $table->string('management_task', 1000)->change();
            $table->string('solution', 1000)->change();
            $table->string('result', 1000)->change();
            $table->string('conclusion', 1000)->change();
        });
    }

    public function down(): void
    {
        Schema::table('management_decisions', function (Blueprint $table) {
            $table->string('problem')->change();
            $table->string('management_task')->change();
            $table->string('solution')->change();
            $table->string('result')->change();
            $table->string('conclusion')->change();
        });
    }
};
