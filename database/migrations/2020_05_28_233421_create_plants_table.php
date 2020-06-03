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
            $table->string('type');
            $table->string('nom');
            $table->text('description');
            $table->string('cm_entre_plants');
            $table->string('cm_entre_rangs');
            $table->string('jours_maturation');
            $table->string('voisinage_fav');
            $table->text('remarques');
            $table->string('images');           
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
        Schema::dropIfExists('plants');
    }
}
