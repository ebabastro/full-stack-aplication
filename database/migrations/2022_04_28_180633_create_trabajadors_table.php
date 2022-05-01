<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('name');
            $table->string('last_name_1');
            $table->string('last_name_2');
            $table->string('sexo');
            $table->string('color_piel');
            $table->string('address');
            $table->string('phone');
            $table->string('militancia');
            $table->datetime('fecha_contratacion');
            $table->tinyInteger('baja');
            $table->dateTime('fecha_baja');
            $table->tinyInteger('docente');
            
            //llaves foraneas
            $table->string('categoria_ocupa_id');
            $table->foreign('categoria_ocupa_id')->references('identificador')->on('trabajador_categoria_ocupacionals');

            $table->string('categoria_dinvest_id');
            $table->foreign('categoria_dinvest_id')->references('identificador')->on('trabajador_categoria_docente_investigativas');

            $table->datetime('fecha_categoria_docente');

            $table->string('grado_cientifico_id');
            $table->foreign('grado_cientifico_id')->references('identificador')->on('trabajador_grado_cientificos');

            $table->string('direccion_id');
            $table->foreign('direccion_id')->references('identificador')->on('trabajador_areas');

            $table->string('cargo_id');
            $table->foreign('cargo_id')->references('identificador')->on('trabajador_cargos');

            $table->string('profesion_id');
            $table->foreign('profesion_id')->references('identificador')->on('trabajador_profesions');

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
        Schema::dropIfExists('trabajadors');
    }
};
