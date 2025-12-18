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
        Schema::create('gold_purchases', function (Blueprint $table) {
            $table->id();   
            $table->string('status', 20);
            $table->dateTime('date');
            $table->foreignId('user_id')->constrained('user_growpaths')->cascadeOnDelete();
            $table->foreignId('package_id')->constrained('gold_shops')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gold_purchases');
    }
};
