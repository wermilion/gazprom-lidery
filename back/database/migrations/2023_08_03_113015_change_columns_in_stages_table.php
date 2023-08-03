<?php

use App\Models\StageStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->timestamp('date_start')->nullable()->change();
            $table->timestamp('date_end')->nullable()->change();
            $table->foreignIdFor(StageStatus::class, 'stage_status_id')->nullable()->change();
        });
    }
    public function down(): void
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->timestamp('date_start')->change();
            $table->timestamp('date_end')->change();
            $table->foreignIdFor(StageStatus::class, 'stage_status_id')->change()->constrained();
        });
    }
};
