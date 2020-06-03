<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            'email' => 'admin@portager.qc.ca',
            'password' => Hash::make('portager'),
            'user_role' => 'Administrateur',
            'api_token' => 'VVGsozaUcRnHdr4qCcyAm9xKVDuGLVo8nxrcWV1NI3i2K5hX6yxhaUWh7FM57TWQ83lAVeJvCaN8m9Vb',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Utilisateur',
            'last_name' => 'Lambda',
            'email' => 'user@portager.qc.ca',
            'password' => Hash::make('portager'),
            'user_role' => 'Utilisateur',
            'api_token' => 'ho8ubW89aIWH7JOjEVB8XrtD3FWVtnhQQGNsrP3Egp2sxsktHSUIGyB8EHp9sOFiwvXHeALFLbOcsU73',
        ]);
    }
}
