<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Register the user seeder
        $this->call(UsersTableSeeder::class);
        $this->call(ApartmentTableSeeder::class);
        $this->call(ResidentsTableSeeder::class);
        $this->call(SensorTableSeeder::class);
        $this->call(ModelCarTableSeeder::class);
        $this->call(CarTableSeeder::class);
        Model::reguard();
    }
}
