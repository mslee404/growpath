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
        Schema::create('item_shops', function (Blueprint $table) {
            $table->string('id_item', 10)->primary();
            $table->string('type');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->timestamps();

            // $table->enum('type', ['skin', 'icon', 'frame']);
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
