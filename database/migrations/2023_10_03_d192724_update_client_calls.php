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
        Schema::table('client_call_actions', function (Blueprint $table) {

            /*$table->foreignId('assign_status')->nullable()->constrained('constants');*/

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_call_actions', function (Blueprint $table) {

        });
    }
};
