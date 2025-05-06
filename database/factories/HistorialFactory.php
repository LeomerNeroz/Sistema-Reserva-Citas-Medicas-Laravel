<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Historial;

class HistorialFactory extends Factory
{
    protected $model = \App\Models\Historial::class;

    public function definition()
    {
        return [
            'detalle' => $this->faker->paragraphs(rand(2, 4), true), 
            'fecha_visita' => $this->faker->date('Y-m-d', 'now'),
            'paciente_id' => \App\Models\Paciente::inRandomOrder()->value('id'),
            'doctor_id' => \App\Models\Doctor::inRandomOrder()->value('id'),
        ];
    }
}