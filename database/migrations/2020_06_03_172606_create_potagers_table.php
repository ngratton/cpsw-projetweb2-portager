<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potagers', function (Blueprint $table) {
            $table->id();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('prov');
            $table->string('country');
            $table->string('postal_code');
            $table->string('photos_path')->nullable()->default('./storage/ngratton_2020.jpg');
            $table->set('tags_potagers', ['Biologique', 'En terre', 'En serre', 'En pot', 'En bacs', "Interieur", 'Agriculture urbaine', 'Communautaire']);
            $table->integer('fk_users_id')->unique();
            $table->tinyInteger('est_actif');
            $table->integer('visites_potagers')->nullable()->default(0);
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
        Schema::dropIfExists('potagers');
    }
}
