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
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('display_name')->nullable();
            $table->unsignedInteger('total_xp')->default(0);
            $table->unsignedInteger('level')->default(1);
            $table->unsignedInteger('total_gold')->default(0);

            $table->foreignId('pp_id')->nullable()->constrained('pps')->nullOnDelete();

            $table->rememberToken();

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