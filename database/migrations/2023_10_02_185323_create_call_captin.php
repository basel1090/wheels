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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->enum('call_type', ['incoming_call', 'outgoing_call']);
            $table->foreignId('captin_id')->constrained();
            $table->foreignId('call_action_id')->nullable()->constrained('constants');
            $table->foreignId('captin_action_id')->nullable()->constrained('constants');
            $table->foreignId('user_id')->constrained();
            $table->date('next_call')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};


