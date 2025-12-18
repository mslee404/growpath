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
        Schema::create('custom_habits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_habit_id')
                ->constrained('user_habits')
                ->cascadeOnDelete();

            $table->string('habit_name',100);
            $table->string('habit_description',255)->nullable();
            $table->time('hour')->nullable();
            $table->integer('day_count');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_habits');
    }
};
