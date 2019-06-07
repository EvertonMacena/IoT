<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('resident_id');
            $table->string('board', 128)->unique();
            $table->string('tag', 128)->unique();
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('resident_id')->references('id')->on('residents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function(Blueprint $table){
            $table->dropForeign('cars_model_id_foreign');
            $table->dropForeign('cars_resident_id_foreign');
        });

        Schema::dropIfExists('cars');
    }
}
