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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('restaurant_id', 50);
            $table->foreignId('country_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('type_id')->constrained('constants'); // private, GOV, NGO
            $table->integer('items_no')->default(0);
            $table->integer('average_item_price')->default(0);
            $table->integer('average_preparation_time')->default(0);
            $table->integer('daily_orders_in_no')->default(0);
            $table->integer('daily_orders_out_no')->default(0);
            $table->integer('has_call_center')->default(0);
            $table->integer('need_internal_call_sys')->default(0);
            $table->integer('has_pos')->default(0);
            $table->integer('has_branch')->default(0);
            $table->foreignId('pos_type')->constrained('constants');
            $table->integer('annual_subscription')->default(0);
            $table->integer('os_type')->constrained('constants');
            $table->integer('sys_satisfaction_rate')->default(0);
            $table->string('telephone', 15);
            $table->string('facebook_address', 200);
            $table->string('instagram_address', 200);
            $table->string('tiktok_address', 200);
            $table->string('fax', 15);
            $table->integer('active')->default(1);
            $table->integer('has_marketing')->default(0);
            $table->string('marketing_rep_name', 200)->nullable();
            $table->string('marketing_rep_co_name', 200)->nullable();
            $table->string('pay_to_marketing_agent_amount', 200)->nullable();


            $table->foreignId('bank_name')->constrained('constants');
            $table->foreignId('bank_branch')->constrained('constants');

            $table->string('iban', 200)->nullable();
            $table->string('visa', 200)->nullable();
            $table->string('cash', 200)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['pos_type']);
            $table->dropForeign(['os_type']);
            $table->dropForeign(['bank_branch']);
            $table->dropForeign(['bank_name']);

        });
        Schema::dropIfExists('hospital_clinic_teams');
    }
};
