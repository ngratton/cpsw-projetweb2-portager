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
            'last_name' => 'inistrateur',
            'email' => 'admin@admin.com',
            'password' => Hash::make('portager'),
            'api_token' => 'VVGsozaUcRnHdr4qCcyAm9xKVDuGLVo8nxrcWV1NI3i2K5hX6yxhaUWh7FM57TWQ83lAVeJvCaN8m9Vb',
        ]);
    }
}
