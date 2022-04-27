<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('name');
            $table->string('last_name_1');
            $table->string('last_name_2');
            $table->string('address');
            $table->string('phone')->nullable();

            //llaves foraneas
            $table->string('carrera_id');
            $table->foreign('carrera_id')->references('identificador')->on('carreras');
            $table->unsignedBigInteger('tipo_curso_id');
            $table->foreign('tipo_curso_id')->references('id')->on('tipo_cursos');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->string('facultad_id')->nullable();
            $table->foreign('facultad_id')->references('identificador')->on('facultads');

            $table->string('cum_id')->nullable();
            $table->foreign('cum_id')->references('identificador')->on('cums');

            $table->string('anno_id')->nullable(); //no todos los años llegan en valor de integer
            $table->foreign('anno_id')->references('code')->on('annos');

            
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
        Schema::dropIfExists('estudiantes');
    }
};
