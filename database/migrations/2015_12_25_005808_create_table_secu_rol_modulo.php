<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecuRolModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_rol_modulo', function (Blueprint $table) {
            $table->increments('rol_modulo_id');
            $table->bigInteger('rol_id')->unsigned();
            $table->bigInteger('modulo_sistema_id')->unsigned();

            $table->foreign('rol_id')->references('rol_id')->on('secu_rol');
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
        Schema::drop('secu_rol_modulo');
    }
}
