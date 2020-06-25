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
            $table->string('photos_path')->nullable()->default('https://img.pizza/210/210/');
            $table->set('tags_potagers', ['Biologique', 'En terre', 'En serre', 'En pot', 'En bacs', "Interieur", 'Agriculture urbaine', 'Communautaire']);
            $table->unsignedBigInteger('user_id')->unique();
            $table->tinyInteger('est_actif');
            $table->integer('potagers_visits')->nullable()->default(0);
            $table->float('note_moy')->nullable();
            $table->timestamps();
        });

        Schema::table('potagers', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
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
