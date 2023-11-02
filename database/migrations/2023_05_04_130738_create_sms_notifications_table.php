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
        Schema::create('system_sms_notifications', function (Blueprint $table) {
            $table->id();
            //Sms, .. etc 
            $table->foreignId('type_id')->constrained('constants');
            $table->string('mobile', 100);
            $table->string('gateway', 100);
            $table->string('message', 100);
            $table->integer('sms_count');
            //module, moduleId
            $table->morphs('sender');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('system_sms_notifications', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('system_sms_notifications');
    }
};
