<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('idsala')->unsigned ();
            $table->foreign('idSala')->references('id')->on('salas');  
            $table->string('cedula');
            $table->Integer('registro');
            $table->Integer('cama');
            $table->string('nombre');
            $table->string('direccion');
            $table->Date('nacimiento');
            $table->String('sexo');    
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
        Schema::dropIfExists('pacientes');
    }
}
