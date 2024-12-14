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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('assigned_to_id')->nullable();
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->foreign('created_by_id')->references('id')->on('users');
            $table->foreign('assigned_to_id')->references('id')->on('users');
            $table->index(['status_id', 'created_by_id', 'assigned_to_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
