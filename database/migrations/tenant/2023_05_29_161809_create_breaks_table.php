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
        Schema::create('breaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->bigInteger('time_id')->unsigned()->nullable();
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('date')->nullable();
            $table->string('type')->nullable();
            $table->string('time_in')->nullable();
            $table->string('time_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breaks');
    }
};
