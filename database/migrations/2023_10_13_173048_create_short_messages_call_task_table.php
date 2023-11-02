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
        Schema::create('short_messages_call_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('constants');
            $table->foreignId('callTask_id')->constrained('call_tasks');
            $table->string('to', 15);

            $table->text('text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('short_messages', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('short_messages');
    }
};
