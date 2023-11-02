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
            $table->string('uniqueid',200)->nullable()->index();
            $table->string('record_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CdrLogs', function (Blueprint $table) {
            //
        });
    }
};
