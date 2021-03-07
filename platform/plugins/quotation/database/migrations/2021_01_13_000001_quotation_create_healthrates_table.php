<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateHealthratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('age_limits')->nullable();
            $table->string('m')->nullable();
            $table->string('m1')->nullable();
            $table->string('m2')->nullable();
            $table->string('m3')->nullable();
            $table->string('m4')->nullable();
            $table->string('m5')->nullable();
            $table->string('extra_dependant')->nullable();
            $table->string('ip')->nullable();
            $table->string('op')->nullable();
            $table->string('maternity')->nullable();
            $table->string('ip_accident')->nullable();
            $table->string('ip_illness')->nullable();
            $table->string('ip_marternity_complications')->nullable();
            $table->string('chronic_pre_existing')->nullable();
            $table->string('newlydiagnosedcondition')->nullable();
            $table->string('bed_limit')->nullable();
            $table->string('congenital_cond')->nullable();
            $table->string('psychiatric')->nullable();
            $table->string('funeral')->nullable();
            $table->string('personal_accident')->nullable();
            $table->string('dental')->nullable();
            $table->string('optical')->nullable();
            $table->string('annual_checkup')->nullable();

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
        Schema::dropIfExists('healthrates');
    }
}