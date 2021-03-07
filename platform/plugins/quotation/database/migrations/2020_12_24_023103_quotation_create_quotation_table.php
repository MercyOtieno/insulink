<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quotation_number')->unique();
            $table->enum('quotation_type', ['health', 'general', 'life']);
            $table->string('inpatient')->nullable();
            $table->string('outpatient')->nullable();
            $table->string('agelimit')->nullable();
            $table->string('total_price');
            $table->string('road_rescue')->nullable();
            $table->string('excess_protector')->nullable();
            $table->string('pvt')->nullable();
            $table->string('loss_use')->nullable();
            $table->string('value_of_vehicle')->nullable();
            $table->string('cover_type')->nullable();
            $table->string('occupiers_liability')->nullable();
            $table->string('building_value')->nullable();
            $table->string('rent_recievable')->nullable();
            $table->string('machinery_breakdown_risk')->nullable();
            $table->string('wiba_servants_indoor')->nullable();
            $table->string('wiba_servants_outdoor')->nullable();
            $table->string('employers_liability')->nullable();
            $table->string('owners_liability')->nullable();
            $table->string('personal_accident')->nullable();
            $table->string('home_office')->nullable();
            $table->string('terrorism_political')->nullable();
            $table->string('content_value')->nullable();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('added_by')->unsigned();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
