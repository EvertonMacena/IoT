<?php

/*
|--------------------------------------------------------------------------
| ModelCar Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. ModelCar factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\User;

$factory->define(App\Resident::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'apartment_id' => $faker->numberBetween(1, 10),
        'user_id' => factory(User::class)->create()->id,
        'contact' => $faker->phoneNumber,
    ];
});

