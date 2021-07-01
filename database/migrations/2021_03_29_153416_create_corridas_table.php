<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorridasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corridas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temporada_id');
            $table->unsignedBigInteger('pista_id');
            
            //adicionar chaves estrangeiras
            $table->foreign('temporada_id')->references('id')->on('temporadas');
            $table->foreign('pista_id')->references('id')->on('pistas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corridas');
    }
}
