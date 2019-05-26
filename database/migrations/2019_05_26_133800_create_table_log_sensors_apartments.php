<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogSensorsApartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sensors_apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sensor_apartment_id');
            $table->string('reading');
            $table->boolean('state');
            $table->timestamps();

            $table->foreign('sensor_apartment_id')->references('id')->on('sensors_apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_sensors_apartments', function(Blueprint $table){
            $table->dropForeign('log_sensors_apartments_sensor_apartment_id_foreign');
        });

        Schema::dropIfExists('log_sensors_apartments');
    }
}
