<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_code')->nullable();
            $table->string('policy_start_date')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('date_paid')->nullable();
            $table->string('phone_paid')->nullable();
            $table->string('termsnconditions')->nullable();
            $table->string('status', 60)->default('unpaid');
            $table->bigInteger('quotation_id')->unsigned();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
}
