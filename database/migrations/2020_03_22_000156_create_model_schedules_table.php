<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');

            $table->date('data_consulta') ->nullable();
            $table->integer('hora_consulta');
            $table->string('consulta_realizada');
            $table->string('descricaoconsulta');
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
        Schema::dropIfExists('schedules');
    }
}
