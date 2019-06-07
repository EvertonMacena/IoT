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

$factory->define(App\Apartment::class, function (Faker\Generator $faker) {
    return [
        'number' => $faker->numberBetween(100, 1000),
        'floor' => $faker->numberBetween(1, 10),
    ];
});

