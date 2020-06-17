<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
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
            $profile = new Profile();
            $profile->photo = './storage/profile_pardefault.svg';
            $profile->bio = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $profile->jardine_depuis = strval(rand($min=1980, $max=2020));
            $profile->tags_jardiniers = 'Écologique,Communautaire';
            $profile->user_id = $i;
            $profile->save();
        }
    }
}
