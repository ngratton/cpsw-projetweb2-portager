<?php

use Illuminate\Database\Seeder;
use App\Plant;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_CA');

        for($i = 0; $i < 50; $i++) {
            $plant = new Plant();
            $plant->fk_types_id = rand($min = 1, $max = 25);
            $plant->description = $faker->paragraph($nbSentences = 2, $variableNbSentences = true);
            $plant->fk_potagers_id = rand($min = 2, $max = 9);
            $plant->save();
        }
    }
}
