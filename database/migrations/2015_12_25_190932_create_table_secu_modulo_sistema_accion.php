<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecuModuloSistemaAccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_modulo_sistema_accion', function (Blueprint $table) {
            $table->bigIncrements('modulo_sistema_accion_id');
            $table->bigInteger('modulo_sistema_id')->unsigned();
            $table->string('denominacion');

            $table->foreign('modulo_sistema_id')->references('modulo_sistema_id')->on('secu_modulo_sistema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_modulo_sistema_accion');
    }
}
