<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('prov');
            $table->string('country');
            $table->string('postal_code');
            $table->text('bio')->nullable();
            $table->string('profil_photo_path')->nullable();
            $table->integer('fk_users_id')->unique();
            $table->tinyInteger('est_actif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
