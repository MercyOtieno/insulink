<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreatePrivateratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privaterates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rate_value_below')->nullable();
            $table->string('rate_value_above')->nullable();
            $table->string('medical_expense')->nullable();
            $table->string('windscreen')->nullable();
            $table->string('towing_recovery')->nullable();
            $table->string('entertainment')->nullable();
            $table->string('authorised_repair')->nullable();
            $table->string('per_event')->nullable();
            $table->string('per_person')->nullable();
            $table->string('tppd')->nullable();
            $table->string('excess_protector')->nullable();
            $table->string('political_terrorism')->nullable();
            $table->string('riot')->nullable();
            $table->string('loss_use')->nullable();
            $table->string('road_rescue')->nullable();
            $table->enum('age_limit', ['above 15', 'below 15','none']);
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('status', 60)->default('active');
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
        Schema::dropIfExists('privaterates');
    }
}
