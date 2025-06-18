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
        Schema::table('personal_infos', function (Blueprint $table) {
            $table->string('middle_name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('martial_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_infos', function (Blueprint $table) {
            //
        });
    }
};
