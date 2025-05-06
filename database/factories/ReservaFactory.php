<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = \App\Models\Reserva::class;

    public function definition()
    {
       
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

       
        $hora_inicio = $this->faker->randomElement(array_keys($bloquesHorarios));
        $hora_fin = $bloquesHorarios[$hora_inicio];

        
        $fecha = $this->faker->dateTimeBetween('now', '+60 days')->format('Y-m-d');

        return [
            'paciente_id' => \App\Models\Paciente::inRandomOrder()->value('id'),
            'doctor_id' => \App\Models\Doctor::inRandomOrder()->value('id'),
            'consultorio_id' => \App\Models\Consultorio::inRandomOrder()->value('id'),
            'event_id' => \App\Models\Event::inRandomOrder()->value('id'),
            'fecha' => $fecha,
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
        ];
    }
}