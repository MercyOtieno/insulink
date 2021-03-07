<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateCommercialowngoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercialowngoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('amount_10years');
            $table->string('amount_above10years');
            $table->string('tppd');
            $table->string('passenger_legal_liability');
            $table->string('entertainment');
            $table->string('windscreen');
            $table->string('repairs');
            $table->string('towing');
            $table->string('medical');
            $table->string('third_party_body');
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
        Schema::dropIfExists('commercialowngoods');
    }
}
