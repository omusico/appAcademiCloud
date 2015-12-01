<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_institucion', function (Blueprint $table) {
            $table->bigIncrements('institucion_id');
            $table->string('denominacion', 500);
            $table->string('direccion', 500)->nullable();
            $table->string('telefono_uno', 30)->nullable();
            $table->string('telefono_dos', 30)->nullable();
            $table->string('telefono_tres', 30)->nullable();
            $table->string('correo_institucional', 250);
            $table->string('path_logo', 300);
            $table->string('colores_css', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('config_institucion');
    }
}
