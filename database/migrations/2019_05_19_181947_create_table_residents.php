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
            $table->unsignedBigInteger('user_id');
            $table->string('contact');
            $table->timestamps();

            $table->foreign('apartment_id')->references('id')->on('apartment');
            $table->foreign('user_id')->references('id')->on('users');
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
            $table->dropForeign('residents_apartment_id_foreign');
            $table->dropForeign('residents_user_id_foreign');
        });
        Schema::dropIfExists('residents');
    }
}
