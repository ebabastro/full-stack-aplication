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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('identificador')->unique(); //extraido del sigenu

            //llaves foraneas
            $table->string('facultad_id')->nullable();
            $table->foreign('facultad_id')->references('identificador')->on('facultads');

            $table->string('cum_id')->nullable();
            $table->foreign('cum_id')->references('identificador')->on('cums');

            $table->string('carrera_nacional_id')->nullable();
            $table->foreign('carrera_nacional_id')->references('identificador')->on('carrera_nacionals');
            
            $table->unsignedBigInteger('tipo_curso_id');
            $table->foreign('tipo_curso_id')->references('id')->on('tipo_cursos');

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
        Schema::dropIfExists('carreras');
    }
};
