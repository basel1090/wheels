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
        Schema::table('restaurants', function (Blueprint $table) {
           /* $table->foreignId('bank_name')->nullable()->constrained('constants')->change();
            $table->foreignId('bank_branch')->nullable()->constrained('constants')->change();
            $table->foreignId('payment_type')->nullable()->constrained('constants')->change();*/
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
