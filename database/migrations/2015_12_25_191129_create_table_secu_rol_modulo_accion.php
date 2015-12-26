<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecuRolModuloAccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_rol_modulo_accion', function (Blueprint $table) {
            $table->bigIncrements('rol_modulo_accion_id');
            $table->bigInteger('rol_modulo_id')->unsigned();
            $table->bigInteger('modulo_sistema_accion_id')->unsigned();
            $table->tinyInteger('permitido');

            $table->foreign('rol_modulo_id')->references('rol_modulo_id')->on('secu_rol_modulo');
            $table->foreign('modulo_sistema_accion_id')->references('modulo_sistema_accion_id')->on('secu_modulo_sistema_accion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_rol_modulo_accion');
    }
}
