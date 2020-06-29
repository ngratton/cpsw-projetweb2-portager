<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echanges', function (Blueprint $table) {
            $table->string('id', 10);
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->enum('status', ['Offre initiale', 'Contre-offre', 'Confirmée', 'Annulée', 'Terminée']);
            $table->tinyInteger('est_actif')->default(1);
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echanges');
    }
}
