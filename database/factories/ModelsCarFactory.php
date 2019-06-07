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

$factory->define(App\ModelCar::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(50),
        'fabric' => $faker->text(10),
        'ano'   => $faker->year,
    ];
});

