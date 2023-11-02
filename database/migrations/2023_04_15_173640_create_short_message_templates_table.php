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
        Schema::create('short_message_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('constants');
            $table->text('template_text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('short_message_templates', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('short_message_templates');
    }
};
