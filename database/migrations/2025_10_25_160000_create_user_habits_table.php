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
        Schema::create('user_habits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('user_growpaths')->cascadeOnDelete();
            $table->enum('habit_type', ['daily', 'weekly', 'monthly','custom']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_habits');
    }
};
