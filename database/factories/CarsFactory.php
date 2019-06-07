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

$factory->define(App\Car::class, function (Faker\Generator $faker) {
    return [
        'board' => strtoupper($faker->text(6)),
        'tag' => strtoupper($faker->text(6)),
        'model_id' => $faker->numberBetween(1, 10),
        'resident_id' => $faker->numberBetween(1, 10),
    ];
});

