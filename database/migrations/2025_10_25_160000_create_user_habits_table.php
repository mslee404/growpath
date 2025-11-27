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
            $table->string('id_user', 10);
            $table->string('id_habit', 10)->primary();
            $table->string('habit_type', 10);
            $table->foreign('id_user')->references('id_user')->on('user_growpaths')->onDelete('cascade');
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
