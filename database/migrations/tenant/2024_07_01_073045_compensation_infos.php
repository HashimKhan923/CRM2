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
        Schema::create('compensation_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('basic_salary', 15, 2)->nullable();
            $table->text('allowances')->nullable();
            $table->text('deductions')->nullable();
            $table->decimal('total_salary', 15, 2)->nullable();
            $table->enum('salary_payment_duration', ['daily', 'weekly', 'monthly','yearly'])->default('monthly');
            $table->string('bank_account')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compensation_infos');

    }
};
