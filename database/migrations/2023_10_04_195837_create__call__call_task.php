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
        Schema::create('call_call_task', function (Blueprint $table) {
            $table->id();
            $table->enum('call_type', ['incoming_call', 'outgoing_call']);
            $table->foreignId('callTask_id')->constrained('call_tasks');
            $table->foreignId('call_action_id')->nullable()->constrained('constants');
            $table->foreignId('callTask_action_id')->nullable()->constrained('constants');
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
        Schema::dropIfExists('_call__call_task');
    }
};
