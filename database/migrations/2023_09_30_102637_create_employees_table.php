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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status')->nullable()->constrained('constants');
            $table->foreignId('gender')->nullable()->constrained('constants');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->integer('active')->default(1);
            $table->float('sick')->default(0);
            $table->float('salary')->default(0);
            $table->float('leaves')->default(0);
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('sid')->nullable();
            $table->string('bank_iban')->nullable();
            $table->string('bank_account')->nullable();
            $table->foreignId('job_title')->nullable()->constrained('constants');
            $table->foreignId('department_id')->nullable()->constrained('constants');
            $table->float('balance')->default(0);
            $table->float('max_annual_leaves')->default(0);
            $table->float('max_annual_sick')->default(0);
            $table->float('max_sick')->default(0);
            $table->float('max_leaves')->default(0);
            $table->float('increment')->default(0);
            $table->float('evaluation')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->string('empno')->nullable();
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->date('dob')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
