<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->unsignedBigInteger('apartment_id');
            $table->string('email');
            $table->string('contact');
            $table->timestamps();

            $table->foreign('apartment_id')->references('id')->on('apartment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->dropForeign('residents_apartment_apartment_id');
        });
        Schema::dropIfExists('residents');
    }
}
