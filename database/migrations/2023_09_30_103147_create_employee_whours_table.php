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
        Schema::create('employee_whours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status')->nullable()->constrained('constants');
            $table->integer('active')->default(1);
            $table->foreignId('employee_id')->nullable()->constrained('employees');
            $table->foreignId('create_user')->nullable()->constrained('users');
            $table->date('work_date')->nullable();
            $table->dateTime('from_time')->nullable();
            $table->dateTime('to_time')->nullable();
            $table->string('notes',1000)->nullable();
            $table->string('last_ip')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->foreignId('update_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_whours');
    }
};
