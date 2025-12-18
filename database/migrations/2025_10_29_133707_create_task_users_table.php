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
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('user_growpaths')->cascadeOnDelete();
            $table->string('task_name', 100);
            $table->text('task_description')->nullable();

            $table->date('due_date')->nullable();
            $table->time('due_time')->nullable();

            $table->boolean('is_completed')->default(false);
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tasks');
    }
};
