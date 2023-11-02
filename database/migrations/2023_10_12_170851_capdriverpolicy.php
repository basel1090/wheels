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
            $table->integer('intersted_in_work_insurance')->default(0);
            $table->integer('intersted_in_health_insurance')->default(0);
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
