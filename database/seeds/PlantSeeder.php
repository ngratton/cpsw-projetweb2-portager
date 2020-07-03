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

        for($i = 0; $i < 200; $i++) {
            $plant = new Plant();
            $plant->type_id = rand($min = 1, $max = 25);
            $plant->description = $faker->paragraph($nbSentences = 2, $variableNbSentences = true);
            $plant->potager_id = rand($min = 1, $max = 9);
            $plant->user_id = $plant->potager_id + 1;

            $randNum = rand($min = 1, $max = 20);

            $plant->photo = '/images/Plants_placeholders/'.$randNum.'.jpg';
            $plant->photo_mini = '/images/Plants_placeholders/'.$randNum.'.jpg';

            $plant->save();
        }
    }
}
