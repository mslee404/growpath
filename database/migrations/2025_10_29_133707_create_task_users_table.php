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
        Schema::create('task_users', function (Blueprint $table) {
            $table->string('id_task',10);
            $table->string('task_name',100);
            $table->string('task_description',255)->nullable();
            $table->date('due_date',20)->nullable();
            $table->time('due_time')->nullable();
            $table->tinyInteger('is_completed')->default(0);
            $table->string('id_user',10);
            $table->primary(['id_task','id_user']);
            $table->foreign('id_user')->references('id_user')->on('user_growpaths')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_users');
    }
};
