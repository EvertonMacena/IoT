<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email',128)->unique();
            $table->string('password');
            $table->boolean('type')->default(false);
            $table->timestamps();
        });

        $user = new \App\User();

        $user->email = 'admin@admin';
        $user->name = 'admin';
        $user->password = password_hash("1234", PASSWORD_BCRYPT);
        $user->type = true;

        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
