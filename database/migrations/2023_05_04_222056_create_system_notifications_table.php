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
        Schema::dropIfExists('system_notifications');
        Schema::create('system_notifications', function (Blueprint $table) {
            $table->id();
            //Firebase, Email, .. etc
            $table->foreignId('type_id')->constrained('constants');
            $table->boolean('status')->default(true);
            $table->boolean('active')->default(true);
            $table->string('subject', 200)->nullable();
            $table->string('message', 2000)->nullable();
            //module, moduleId
            $table->morphs('notifiable');
            $table->string('attachment', 200)->nullable();
            $table->foreignId('sent_by')->constrained('users');
            $table->foreignId('sent_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('system_notifications', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['sent_to']);
            $table->dropForeign(['sent_by']);
        });
        Schema::dropIfExists('system_notifications');
    }
};
