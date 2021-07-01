<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampeaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('piloto_id');
            $table->unsignedBigInteger('equipe_id');
            $table->unsignedBigInteger('temporada_id');

            $table->foreign('piloto_id')->references('id')->on('pilotos');
            $table->foreign('equipe_id')->references('id')->on('equipes');
            $table->foreign('temporada_id')->references('id')->on('temporadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campeoes');
    }
}
