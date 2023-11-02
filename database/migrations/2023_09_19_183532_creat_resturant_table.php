<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_branches', function (Blueprint $table) {
            $table->id();
            $table->string('address', 800)->nullable();
            $table->foreignId('restaurant_id')->constrained('restaurants');
            $table->foreignId('city_id')->constrained();
            $table->string('telephone', 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurant_branches', function (Blueprint $table) {
            Schema::dropIfExists('restaurant_id');
            Schema::dropIfExists('city_id');
        });
        Schema::dropIfExists('restaurant_branches');
    }
};
