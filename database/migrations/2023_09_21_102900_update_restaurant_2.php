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
            $table->string('telephone', 15)->nullable()->change();
            $table->string('facebook_address', 200)->nullable()->change();
            $table->string('instagram_address', 200)->nullable()->change();
            $table->string('tiktok_address', 200)->nullable()->change();
            $table->string('fax', 15)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurant', function (Blueprint $table) {
            //
        });
    }
};
