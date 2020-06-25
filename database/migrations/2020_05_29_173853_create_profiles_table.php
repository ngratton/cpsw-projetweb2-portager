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
            $table->string('photo')->nullable()->default('./storage/profile_pardefault.svg');
            $table->string('photo_mini')->nullable()->default('./storage/profile_pardefault.svg');
            $table->text('bio')->nullable();
            $table->integer('jardine_depuis');
            $table->set('tags_jardiniers', ['Amateur', 'Autosuffisant', 'Biologique', 'Ecologique', 'Communautaire', 'Conventionnel']);
            $table->unsignedBigInteger('user_id')->unique();
            $table->tinyInteger('est_actif')->default(1);
            $table->integer('profile_visits')->nullable()->default(0);
            $table->float('note_moy')->nullable();
            $table->timestamps();
        });

        Schema::table('profiles', function(Blueprint $table) {
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
        Schema::dropIfExists('profiles');
    }
}
