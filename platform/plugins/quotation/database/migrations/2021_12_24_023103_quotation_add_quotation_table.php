<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class QuotationAddQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('quotations', function (Blueprint $table) {
            $table->string('ip')->nullable();
            $table->string('pre_existing')->nullable();
            $table->string('children')->nullable();
            $table->string('cover_details')->nullable();
            $table->string('age')->nullable();
            $table->string('dob')->nullable();
            $table->longText('pre_existing_details')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn(['ip']);
            $table->dropColumn('pre_existing');
            $table->dropColumn('children');
            $table->dropColumn('cover_details');
            $table->dropColumn('age');
            $table->dropColumn('dob');
        });
    }
}
