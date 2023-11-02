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
        Schema::create('restaurant_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name',800)->nullable();
            $table->foreignId('restaurant_branch_id')->constrained('restaurant_branches');
            $table->integer('price');
            $table->integer('preparation_time');
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
        Schema::table('restaurant_items', function (Blueprint $table) {
            Schema::dropIfExists('restaurant_branch_id');
            Schema::dropIfExists('status');
        });
        Schema::dropIfExists('restaurant_items');
    }
};
