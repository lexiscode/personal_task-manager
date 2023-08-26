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
        Schema::connection('task_manager')->create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            
            $table->string('title');
            $table->text('description');
            $table->date('due_date');
            $table->string('status');
            $table->string('category');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
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
