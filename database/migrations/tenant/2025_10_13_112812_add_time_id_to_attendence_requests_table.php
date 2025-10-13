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
        Schema::table('attendence_requests', function (Blueprint $table) {
            $table->bigInteger('time_id')->unsigned()->nullable();
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendence_requests', function (Blueprint $table) {
            //
        });
    }
};
