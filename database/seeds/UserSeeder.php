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
            'api_token' => 'VVGsozaUcRnHdr4qCcyAm9xKVDuGLVo8nxrcWV1NI3i2K5hX6yxhaUWh7FM57TWQ83lAVeJvCaN8m9Vb',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Utilisateur',
            'last_name' => 'Lambda',
            'email' => 'user@portager.com',
            'password' => Hash::make('portager'),
            'user_role' => 'Utilisateur',
            'api_token' => 'ho8ubW89aIWH7JOjEVB8XrtD3FWVtnhQQGNsrP3Egp2sxsktHSUIGyB8EHp9sOFiwvXHeALFLbOcsU73',
        ]);

        $faker = Faker\Factory::create('fr_CA');

        for($i = 3; $i <= 10; $i++) {
            $user = new User();
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->unique()->safeEmail;
            $user->password = bcrypt('portager');
            $user->user_role = 'Utilisateur';
            $user->api_token = Str::random(80);
            $user->save();
        }
    }
}
