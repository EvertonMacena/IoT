<?php

use Illuminate\Database\Seeder;

class SensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sensor::class, 10)->create()->each(function ($sensor) {
            $sensor->apartments()->save(factory(App\Apartment::class)->make());
        });
    }
}
