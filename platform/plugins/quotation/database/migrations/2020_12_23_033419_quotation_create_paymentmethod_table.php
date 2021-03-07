<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreatePaymentmethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paybill')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('paypalemail')->nullable();
            $table->enum('method', ['mpesa', 'bank transfer', 'pesalink', 'visa', 'mastercard', 'paypal', 'airtel money'])->nullable();
            $table->string('status', 60)->default('published');
            $table->bigInteger('underwriter_id')->unsigned();
            $table->foreign('underwriter_id')->references('id')->on('underwriters')->onDelete('cascade');
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
        Schema::dropIfExists('paymentmethods');
    }
}
