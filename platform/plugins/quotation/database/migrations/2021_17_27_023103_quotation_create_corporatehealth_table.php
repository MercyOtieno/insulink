<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateCorporateHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('corporatehealth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
            $table->string('contact_person');
            $table->string('telephone');
            $table->string('no_employees');
            $table->string('ip')->nullable();
            $table->string('op')->nullable();
            $table->bigInteger('underwriter_id')->unsigned();
            $table->foreign('underwriter_id')->references('id')->on('underwriters')->onDelete('cascade');
            $table->string('email');
            $table->string('status')->nullable();
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
       Schema::dropIfExists('corporatehealth');
    }
}
