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
        Schema::create('call_questionnaire_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('call_id')->constrained();
            $table->foreignId('captin_id')->constrained();
            $table->foreignId('call_questionnaire_id')->constrained();
            $table->unsignedBigInteger('cq_question_id');
            $table->foreign('cq_question_id')->references('id')->on('call_questionnaire_questions');
            $table->text('answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('call_questionnaire_responses', function (Blueprint $table) {
            $table->dropForeign(['call_id']);
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['call_questionnaire_id']);
            $table->dropForeign(['cq_question_id']);
        });
        Schema::dropIfExists('call_questionnaire_responses');
    }
};
