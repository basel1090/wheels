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
        Schema::create('call_questionnaire_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('call_questionnaire_id')->constrained();
            $table->string('text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('call_questionnaire_questions', function (Blueprint $table) {
            $table->dropForeign(['call_questionnaire_id']);
        });
        Schema::dropIfExists('call_questionnaire_questions');
    }
};
