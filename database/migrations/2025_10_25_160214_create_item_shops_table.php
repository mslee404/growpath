<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_shops', function (Blueprint $table) {
            $table->id(); // PK utama

            $table->string('code', 10)->unique(); // A0001, F0001, dst
            $table->string('name', 50);
            $table->string('desc', 255);
            $table->enum('type', ['avatar', 'avatar_frame', 'tanaman', 'background']);
            $table->unsignedInteger('price');
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_shops');
    }
};
