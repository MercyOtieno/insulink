<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('cellphone');
            $table->string('email');
            $table->string('policy_number');
            $table->string('underwriter');
            $table->string('police_abstract');
            $table->string('driver_license');
            $table->string('logbook');
            $table->string('status');
            $table->string('claim_number')->unique();
            $table->enum('notification', ['email', 'sms', 'none']);
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
        Schema::dropIfExists('claims');
    }
}
