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
        return;
        Schema::create('captins', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 200);
            $table->string('name', 100);
            $table->string('name_en', 200);
            $table->string('address', 200);
            $table->foreignId('country_id')->constrained();
            $table->foreignId('blood_type')->constrained('constants');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('assign_city_id')->constrained('cities');
            $table->date('dob')->nullable();

            $table->string('mobile1', 15);
            $table->string('mobile2', 15)->nullable();

            $table->foreignId('degree')->constrained('constants');
            $table->integer('previous_experience_delivery')->default(0);
            $table->string('company_name', 100)->nullable();
            $table->string('current_work', 100)->nullable();

            $table->string('reference_name', 200);
            $table->date('reference_dob')->nullable();
            $table->string('reference_mobile1', 15)->nullable();
            $table->string('reference_mobile2', 15)->nullable();
            $table->foreignId('reference_city')->nullable()->constrained('cities');
            //$table->foreignId('reference_relative')->constrained('constants');
            $table->string('reference_relative', 100)->nullable();
            $table->foreignId('vehicle_type')->constrained('constants');
            $table->string('vehicle_no', 200)->nullable();
            $table->foreignId('vehicle_model')->nullable()->constrained('constants');
            $table->integer('vehicle_year')->default(0);
            $table->integer('motor_cc')->default(0);
            $table->foreignId('fuel_type')->nullable()->constrained('constants');
            $table->foreignId('box_no')->nullable()->constrained('constants');
            $table->integer('sign_permission')->nullable();
            $table->foreignId('promissory')->constrained('constants');

            $table->integer('has_insurance')->default(0);
            $table->foreignId('insurance_company')->nullable()->constrained('constants');
            $table->foreignId('insurance_type')->nullable()->constrained('constants');
            $table->date('policy_start')->nullable();
            $table->date('policy_expire')->nullable();
            $table->string('policy_no')->nullable();
            $table->foreignId('policy_code')->nullable()->constrained('constants');
            $table->foreignId('policy_degree')->nullable()->constrained('constants');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('captins');
    }
};
