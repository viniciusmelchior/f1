<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corrida_id');

            $table->unsignedBigInteger('pole_piloto');
            $table->unsignedBigInteger('pole_equipe');
            $table->unsignedBigInteger('primeiro_piloto');
            $table->unsignedBigInteger('primeiro_equipe');
            $table->unsignedBigInteger('segundo_piloto');
            $table->unsignedBigInteger('segundo_equipe');
            $table->unsignedBigInteger('terceiro_piloto');
            $table->unsignedBigInteger('terceiro_equipe');
            $table->integer('eu_largada');
            $table->integer('eu_chegada');

            //adicionar chaves
            $table->foreign('corrida_id')->references('id')->on('corridas');
            $table->foreign('pole_piloto')->references('id')->on('pilotos');
            $table->foreign('pole_equipe')->references('id')->on('equipes');
            $table->foreign('primeiro_piloto')->references('id')->on('pilotos');
            $table->foreign('primeiro_equipe')->references('id')->on('equipes');
            $table->foreign('segundo_piloto')->references('id')->on('pilotos');
            $table->foreign('segundo_equipe')->references('id')->on('equipes');
            $table->foreign('terceiro_piloto')->references('id')->on('pilotos');
            $table->foreign('terceiro_equipe')->references('id')->on('equipes');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
}
