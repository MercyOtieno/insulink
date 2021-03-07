<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationAddHealthratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healthrates', function (Blueprint $table) {
            $table->string('spouse')->nullable();
            $table->string('child')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('healthrates', function (Blueprint $table) {
            $table->dropColumn('spouse');
            $table->dropColumn('child');
        });
    }
}