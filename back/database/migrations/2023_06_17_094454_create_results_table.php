<?php

use App\Models\ResultStatus;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Stage::class, 'stage_id')->constrained();
            $table->foreignIdFor(User::class, 'user_id')->constrained();
            $table->foreignIdFor(ResultStatus::class, 'result_status_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
