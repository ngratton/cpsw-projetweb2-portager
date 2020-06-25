<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Istrateur',
            'email' => 'admin@portager.com',
            'password' => Hash::make('portager'),
            'user_role' => 'Administrateur',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Utilisateur',
            'last_name' => 'Lambda',
            'email' => 'user@portager.com',
            'password' => Hash::make('portager'),
            'user_role' => 'Utilisateur',
        ]);

        $faker = Faker\Factory::create('fr_CA');

        for($i = 3; $i <= 10; $i++) {
            $user = new User();
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->unique()->safeEmail;
            $user->password = bcrypt('portager');
            $user->user_role = 'Utilisateur';
            $user->save();
        }
    }
}
