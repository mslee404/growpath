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
        Schema::create('habit_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_habit_id')
                ->constrained('user_habits')
                ->cascadeOnDelete();
            $table->date('completion_date');
            $table->unsignedInteger('xp_earned');
            $table->timestamps();
            // mencegah habit yang sama dicatat 2x di hari yang sama
            $table->unique(['user_habit_id', 'completion_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_records');
    }
};
