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
        Schema::table('restaurants', function (Blueprint $table) {

            $table->integer('commission_visa')->default(0);
            $table->integer('commission_cash')->default(0);
            $table->integer('total_orders')->default(0);
            $table->integer('total_sales_cash')->default(0);
            $table->integer('total_sales_visa')->default(0);
            $table->date('join_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            //
        });
    }
};
