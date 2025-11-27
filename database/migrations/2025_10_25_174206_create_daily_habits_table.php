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
        Schema::create('daily_habits', function (Blueprint $table) {
            
            $table->string('id_habit', 10)->primary();
            $table->string('habit_name');
            $table->string('habit_description')->nullable();
            $table->time('hour')->nullable();
            $table->timestamps();

            $table->foreign('id_habit')->references('id_habit')->on('user_habits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_habits');
    }
};
