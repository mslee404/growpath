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
        Schema::create('user_growpaths', function (Blueprint $table) {
            $table->string('id_user', 10)->primary();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('diplay_name')->nullable();
            $table->integer('total_xp')->default(0);
            $table->integer('level')->default(1);
            $table->integer('total_gold')->default(0);
            $table->string('pp_id', 10)->nullable();

            $table->foreign('pp_id')->references('id_pp')->on('pps')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_growpaths');
    }
};
