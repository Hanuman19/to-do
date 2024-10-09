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
            $table->string('title')->comment('Название задачи');
            $table->string('description')->nullable()->comment('Описание задачи');
            $table->boolean('completed')->default(false)->comment('Статус завершена/не завершена');
            $table->dateTime('completed_at')->nullable()->comment('Дата завершения задачи');
            $table->timestamps();
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
