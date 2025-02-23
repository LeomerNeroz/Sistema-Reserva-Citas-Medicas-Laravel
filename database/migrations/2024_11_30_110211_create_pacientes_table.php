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
            $table->id();
            $table->string('nombres' ,100);
            $table->string('apellidos' ,100);
            $table->string('ci' ,100)->unique()->nullable();
            $table->string('fecha_nacimiento' ,100);
            $table->string('genero' ,10);
            $table->string('celular' ,20);
            $table->string('correo' ,100)->unique();
            $table->string('direccion' ,255);
            $table->string('grupo_sanguineo' ,255);
            $table->string('alergias' ,255)->nullable();
            $table->string('contacto_emergencia' ,255)->nullable();
            $table->string('observaciones' ,255)->nullable();
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
