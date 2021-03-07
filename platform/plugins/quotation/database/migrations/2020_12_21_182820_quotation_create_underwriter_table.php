<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationCreateUnderwriterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('underwriters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
			$table->string('api_key')->nullable();
			$table->string('api_secret')->nullable();
			$table->string('api_email')->nullable();
			$table->string('api_password')->nullable();
			$table->string('api_prod_url')->nullable();
			$table->string('api_uat_url')->nullable();
			$table->string('address');
			$table->string('phone');
            $table->string('email')->unique();
            $table->text('logo')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('added_by')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('underwriters');
    }
}
