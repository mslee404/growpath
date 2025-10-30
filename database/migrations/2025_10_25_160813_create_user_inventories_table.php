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
        Schema::create('user_inventories', function (Blueprint $table) {

            $table->string('id_user', 10);
            $table->boolean('is_equipped')->default(false);
            $table->string('id_item', 10);
            $table->primary(['id_user', 'id_item']);
            $table->foreign('id_user')->references('id_user')->on('user_growpaths')->onDelete('cascade');
            $table->foreign('id_item')->references('id_item')->on('item_shops')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_inventories');
    }
};
