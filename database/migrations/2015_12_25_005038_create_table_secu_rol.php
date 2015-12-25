<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecuRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_rol', function (Blueprint $table) {
            $table->bigIncrements('rol_id');
            $table->bigInteger('subsistema_id')->unsigned();
            $table->string('denominacion');
            $table->string('denominacion_visual');
            $table->tinyInteger('activo');
            $table->foreign('subsistema_id')->references('subsistema_id')->on('secu_subsistema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_rol');
    }
}
