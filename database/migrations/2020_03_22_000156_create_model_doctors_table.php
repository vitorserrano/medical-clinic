<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {    
            $table->id();
            $table->string('nome_medico');            
            $table->date('data_nascimento')-> nullable();
            $table->string('cpf', 11)->unique();
            $table->string('rg')->unique();
            $table->string('crm')->unique();
            $table->string('fone_celular', 11)->unique();
            $table->string('email')->unique();            
            $table->unsignedBigInteger('id_especialidade');
            $table->foreign('id_especialidade')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('doctors');
    }
}
