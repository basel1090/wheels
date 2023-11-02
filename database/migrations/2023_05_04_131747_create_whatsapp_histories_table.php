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
        Schema::create('whatsapp_histories', function (Blueprint $table) {
            $table->id();
            $table->string('body', 5000)->nullable();
            $table->string('fromMe', 10)->nullable();
            $table->string('self', 10)->nullable();
            $table->string('isForwarded', 10)->nullable();
            $table->string('author', 50)->nullable();
            $table->string('time', 50)->nullable();
            $table->string('chatId', 50)->nullable();
            $table->string('messageNumber', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('senderName', 100)->nullable();
            $table->string('caption', 100)->nullable();
            $table->string('quotedMsgBody', 100)->nullable();
            $table->string('quotedMsgId', 100)->nullable();
            $table->string('quotedMsgType', 100)->nullable();
            $table->string('metadata', 900)->nullable();
            $table->string('ack', 100)->nullable();
            $table->string('chatName', 100)->nullable();
            $table->unsignedInteger('idd');
            $table->morphs('instance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp_histories');
    }
};
