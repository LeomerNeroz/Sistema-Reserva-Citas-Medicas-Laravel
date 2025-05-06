<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Horario;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Consultorio;

class HorarioFactory extends Factory
{
    protected $model = \App\Models\Horario::class;

    public function definition()
    {
        // Bloques horarios fijos
        $bloquesHorarios = [
            '06:00:00' => '07:00:00',
            '07:00:00' => '08:00:00',
            '08:00:00' => '09:00:00',
            '09:00:00' => '10:00:00',
            '10:00:00' => '11:00:00',
            '11:00:00' => '12:00:00',
            '12:00:00' => '13:00:00',
            '13:00:00' => '14:00:00',
            '14:00:00' => '15:00:00',
            '15:00:00' => '16:00:00',
            '16:00:00' => '17:00:00',
            '17:00:00' => '18:00:00',
            '18:00:00' => '19:00:00',
            '19:00:00' => '20:00:00',
        ];

        // Días de la semana
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        // Seleccionar consultorio existente
        $consultorio = Consultorio::inRandomOrder()->first();
        if (!$consultorio) {
            throw new \Exception("No hay consultorios en la base de datos. Por favor, crea algunos antes de ejecutar este factory.");
        }

        // Seleccionar doctor existente
        $doctor = Doctor::inRandomOrder()->first();
        if (!$doctor) {
            throw new \Exception("No hay doctores en la base de datos. Por favor, crea algunos antes de ejecutar este factory.");
        }

        // Seleccionar paciente existente
        $paciente = Paciente::inRandomOrder()->first();
        if (!$paciente) {
            throw new \Exception("No hay pacientes en la base de datos. Por favor, crea algunos antes de ejecutar este factory.");
        }

        // Seleccionar día aleatorio
        $dia = $this->faker->randomElement($dias);

        // Seleccionar un bloque horario al azar
        $hora_inicio = $this->faker->randomElement(array_keys($bloquesHorarios));
        $hora_fin = $bloquesHorarios[$hora_inicio];

        // Fecha ficticia (solo relleno)
        $fecha = $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d');

        // Validar que no haya solapamiento
        $intentos = 0;
        while ($this->existeSolapamiento($consultorio->id, $dia, $hora_inicio, $hora_fin)) {
            $hora_inicio = $this->faker->randomElement(array_keys($bloquesHorarios));
            $hora_fin = $bloquesHorarios[$hora_inicio];
            $intentos++;

            if ($intentos > 50) {
                break; // Evitar bucle infinito
            }
        }

        return [
            'dia' => $dia,
            'fecha' => $fecha,
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            'doctor_id' => $doctor->id,
            'consultorio_id' => $consultorio->id,
            'paciente_id' => $paciente->id,
        ];
    }

    /**
     * Verifica si ya existe un horario solapado para ese consultorio y día
     */
    private function existeSolapamiento($consultorioId, $dia, $horaInicio, $horaFin)
    {
        return Horario::where('consultorio_id', $consultorioId)
            ->where('dia', $dia)
            ->where(function ($query) use ($horaInicio, $horaFin) {
                $query->whereTime('hora_inicio', '<', $horaFin)
                      ->whereTime('hora_fin', '>', $horaInicio);
            })
            ->exists();
    }
}