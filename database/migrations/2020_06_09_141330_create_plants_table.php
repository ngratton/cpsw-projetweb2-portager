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
            $table->unsignedBigInteger('fk_types_id');
            $table->text('description')->nullable();
            $table->string('photo_path')->default('https://img.pizza/210/210/');
            $table->tinyInteger('est_partage')->default(1);
            $table->tinyInteger('est_actif')->default(1);
            $table->integer('plants_visits')->nullable()->default(0);
            $table->unsignedBigInteger('fk_potagers_id');
            $table->timestamps();
        });

        Schema::table('plants', function (Blueprint $table) {
            $table->foreign('fk_types_id')->references('id')->on('types');
            $table->foreign('fk_potagers_id')->references('id')->on('potagers');
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
