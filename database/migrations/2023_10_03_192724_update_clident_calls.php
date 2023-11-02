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
//
          /* $table->foreignId('call_status')->nullable()->constrained('constants');
            $table->foreignId('caller_type')->nullable()->constrained('constants');
            $table->float('duration')->nullable();
            $table->string('module')->nullable();
            $table->integer('module_id')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('assign_employee')->nullable()->constrained('users');
           // $table->foreignId('assign_status')->nullable()->constrained('constants');
            $table->foreignId('urgency')->nullable()->constrained('constants');*/
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
