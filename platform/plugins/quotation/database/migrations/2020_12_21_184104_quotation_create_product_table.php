<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('underwriter_id')->unsigned();
            $table->string('name')->unique();
            $table->enum('category', array('health', 'general', 'life'));
            $table->enum('pricing_rate', array('custom', 'static'));
            $table->string('max_premium')->nullabel();
            $table->string('min_premium')->nullabel();
            $table->enum('cover_type', array('c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7','c8','c9', 'c10', 'c11', 'c12','c13', 'h1','h2'))->nullable();
            $table->string('status', 60)->default('active');
            $table->integer('added_by')->unsigned();
            $table->timestamps();
            $table->foreign('underwriter_id')->references('id')->on('underwriters')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
