<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchangeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echange_items', function (Blueprint $table) {
            $table->id();
            $table->string('echange_id');
            $table->unsignedBigInteger('plant_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('est_actif')->default(1);
            $table->timestamps();
        });

        Schema::table('echange_items', function (Blueprint $table) {
            $table->foreign('echange_id')->references('id')->on('echanges');
            $table->foreign('plant_id')->references('id')->on('plants');
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
        Schema::dropIfExists('echange_items');
    }
}
