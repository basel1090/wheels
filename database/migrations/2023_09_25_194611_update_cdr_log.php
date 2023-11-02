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
        Schema::table('cdr_logs', function (Blueprint $table) {
            $table->string('call_status',200)->nullable()->change();
            $table->string('call_type', 200)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cdr_log', function (Blueprint $table) {
            //
        });
    }
};
