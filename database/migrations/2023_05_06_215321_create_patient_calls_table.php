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
        Schema::create('client_call_actions', function (Blueprint $table) {
            $table->id();
            $table->string('telephone', 15);
            $table->foreignId('employee_id')->constrained('users');
            $table->foreignId('call_option_id')->constrained('constants');
            //Module type , id
            $table->string('call_action');
            $table->nullableMorphs('action');
            $table->string('listen')->nullable();
            $table->boolean('status')->default(true);
            $table->string('notes')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_sid')->nullable();
            $table->string('type')->nullable();
            $table->string('call_option')->nullable();
            $table->string('telephone_no')->nullable();
            $table->integer('active')->default(0);
            $table->string('uniqueid',200)->default(0);
            $table->string('call_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_call_actions', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['call_option_id']);
        });
        Schema::dropIfExists('client_call_actions');
    }
};
