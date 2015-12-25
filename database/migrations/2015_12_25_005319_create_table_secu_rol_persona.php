<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSecuRolPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_rol_persona', function (Blueprint $table) {
            $table->bigIncrements('rol_persona_id');
            $table->bigInteger('rol_id')->unsigned();
            $table->bigInteger('persona_id')->unsigned();
            $table->date('fecha_creacion');

            $table->foreign('rol_id')->references('rol_id')->on('secu_rol');
            $table->foreign('persona_id')->references('persona_id')->on('rrhh_persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_rol_persona');
    }
}
