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
        Schema::create('monthly_habits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_habit_id')
                ->constrained('user_habits')
                ->cascadeOnDelete();

            $table->string('habit_name');
            $table->text('habit_description')->nullable();
            $table->time('hour')->nullable();
            $table->enum('schedule_type', ['date', 'week']);
            $table->unsignedTinyInteger('date')->nullable();
            $table->unsignedTinyInteger('week')->nullable();
            $table->enum('day', [
                'senin',
                'selasa',
                'rabu',
                'kamis',
                'jumat',
                'sabtu',
                'minggu',
            ])->nullable();               
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_habits');
    }
};
