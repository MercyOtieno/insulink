<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateDomesticratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domesticrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('building_rate', 250)->nullable();
            $table->string('rent_recievable', 250)->nullable();
            $table->string('machinery_breakdown_risk', 250)->nullable();
            $table->string('wiba_servants_indoor', 250)->nullable();
            $table->string('wiba_servants_outdoor', 250)->nullable();
            $table->string('employers_liability', 250)->nullable();
            $table->string('occupiers_liability', 250)->nullable();
            $table->string('owners_liability', 250)->nullable();
            $table->string('personal_accident', 250)->nullable();
            $table->string('home_office', 250)->nullable();
            $table->string('terrorism_political', 250)->nullable();
            $table->string('items_rate', 250)->nullable();
            $table->string('allrisk_rate_a', 250)->nullable();
            $table->string('allrisk_rate_b', 250)->nullable();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('domesticrates');
    }
}





