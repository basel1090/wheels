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
        Schema::create('restaurant_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',800)->nullable();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('restaurant_branch_id')->constrained('restaurant_branches');
            $table->string('mobile', 15);
            $table->string('title',200);
            $table->foreignId('status')->constrained('constants');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurant_employee', function (Blueprint $table) {
            Schema::dropIfExists('restaurant_branch_id');
            Schema::dropIfExists('city_id');
        });
        Schema::dropIfExists('restaurant_employee');
    }
};
