<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Juegos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id');
            $table->string('equipo_1', 250);
            $table->string('equipo_2', 250);
            $table->integer('score_equipo_1')->unsigned()->default(0);
            $table->integer('score_equipo_2')->unsigned()->default(0);
            $table->datetime('fecha_de_juego');
            $table->integer('estado')->unsigned()->default(0);
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
        Schema::dropIfExists('juegos');
    }
}
