<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->text('description')->nullable();
            $table->string('photo')->default('https://img.pizza/420/420/');
            $table->string('photo_mini')->default('https://img.pizza/210/210/');
            $table->tinyInteger('est_partage')->default(1);
            $table->tinyInteger('est_actif')->default(1);
            $table->integer('plants_visits')->nullable()->default(0);
            $table->unsignedBigInteger('potager_id');
            $table->unsignedBigInteger('user_id');
            $table->float('note_moy')->nullable();
            $table->timestamps();
        });

        Schema::table('plants', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('potager_id')->references('id')->on('potagers');
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
        Schema::dropIfExists('plants');
    }
}
