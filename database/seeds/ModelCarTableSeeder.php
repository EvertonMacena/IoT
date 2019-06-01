<?php

use Illuminate\Database\Seeder;

class ModelCarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ModelCar::class, 10)->create();
    }
}
