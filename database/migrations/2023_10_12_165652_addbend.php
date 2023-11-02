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
            $table->dropForeign('captins_blood_type_foreign') ;
            //$table->foreignId('blood_type')->nullable()->constrained('constants')->change();
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
