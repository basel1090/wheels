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
        Schema::create('call_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('call_id')->nullable()->constrained('client_call_actions');
            $table->foreignId('task_status')->nullable()->constrained('constants');
            $table->foreignId('task_action')->nullable()->constrained('constants');
            $table->string('task_notes',1000)->nullable();
            $table->foreignId('task_urgency')->nullable()->constrained('constants');
            $table->foreignId('task_employee')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_tasks');
    }
};
