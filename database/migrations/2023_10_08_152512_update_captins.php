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
            $table->foreignId('bank_name')->nullable()->constrained('constants');
            $table->string('bank_branch')->nullable();
            $table->string('iban')->nullable();
            $table->foreignId('payment_method')->nullable()->constrained('constants');
            $table->foreignId('payment_type')->nullable()->constrained('constants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('captin', function (Blueprint $table) {
            //
        });
    }
};
