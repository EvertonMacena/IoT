<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensorsApartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sensor_id');
            $table->unsignedBigInteger('apartment_id');
            $table->boolean('is_on');
            $table->timestamps();

            $table->foreign('sensor_id')->references('id')->on('sensors');
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
        Schema::table('sensors_apartments', function (Blueprint $table){
            $table->dropForeign('sensors_apartments_sensor_id_foreign');
            $table->dropForeign('sensors_apartments_apartment_id_foreign');
        });

        Schema::dropIfExists('sensors_apartments');
    }
}
