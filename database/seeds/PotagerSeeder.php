<?php

use Illuminate\Database\Seeder;
use App\Potager;

class PotagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_CA');

        for($i = 2; $i <= 10; $i++) {
            $potager = new Potager();
            $potager->address_1 = $faker->streetAddress;
            $potager->city = $faker->city;
            $potager->prov = 'Qc';
            $potager->country = 'Canada';
            $potager->postal_code = $faker->postcode;
            $potager->tags_potagers = 'Communautaire';
            $potager->user_id = $i;
            $potager->est_actif = 1;
            $potager->save();
        }

    }
}
