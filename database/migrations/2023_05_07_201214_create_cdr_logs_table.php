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
        Schema::create('cdr_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('date');
            $table->string('from');
            $table->string('to');
            $table->integer('duration');
            $table->enum('call_status', ['answered', 'no answer']);
            $table->enum('call_type', ['inbound', 'outbound']);
            $table->string('record_file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cdr_logs');
    }
};
