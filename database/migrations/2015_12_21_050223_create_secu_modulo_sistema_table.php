<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecuModuloSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_modulo_sistema', function (Blueprint $table) {
            $table->bigIncrements('modulo_sistema_id');
            $table->bigInteger('grupo_opciones_id')->unsigned();
            $table->string('identificador_acceso', 100);
            $table->string('denominacion', 250);
            $table->string('denominacion_visual', 250);
            $table->string('controlador', 250);
            $table->string('vista', 250);
            $table->string('thumbnail', 250);


            $table->foreign('grupo_opciones_id')->references('grupo_opciones_id')->on('secu_grupo_opciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_modulo_sistema');
    }
}
