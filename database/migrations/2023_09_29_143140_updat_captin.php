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
        Schema::table('captins', function (Blueprint $table) {
            $table->integer('active')->default(1);
            $table->integer('total_orders')->default(0);
            $table->integer('total_commission_cash')->default(0);
            $table->integer('total_commission_visa')->default(0);
            $table->date('join_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('captins', function (Blueprint $table) {
            //
        });
    }
};
