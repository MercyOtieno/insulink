<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_no')->unique();
            $table->string('names');
            $table->string('email')->unique();
            $table->string('cellphone');
            $table->string('status');
            $table->string('product');
            $table->bigInteger('underwriter_id')->unsigned();
            $table->foreign('underwriter_id')->references('id')->on('underwriters')->onDelete('cascade');
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
        Schema::dropIfExists('leads');
    }
}
