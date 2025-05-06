<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPacienteIdToHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('horarios', function (Blueprint $table) {
        // Añadir paciente_id como unsignedBigInteger y nullable (opcional)
        $table->unsignedBigInteger('paciente_id')->nullable()->after('consultorio_id');

        // Si quieres definir la clave foránea (recomendado si usas restricciones)
        $table->foreign('paciente_id')
              ->references('id')->on('pacientes')
              ->onDelete('set null')
              ->onUpdate('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horarios', function (Blueprint $table) {
            //
        });
    }
}
