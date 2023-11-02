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
            $table->string('id_wheel',100)->nullable();
            $table->foreignId('shift')->nullable()->constrained('constants');
            $table->float('paid')->nullable();
            $table->float('net_paid')->nullable();
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
