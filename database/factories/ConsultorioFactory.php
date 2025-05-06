<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultorioFactory extends Factory
{
    protected $model = \App\Models\Consultorio::class;

    public function definition()
    {
        return [
            'nombre' => (string) $this->faker->numberBetween(1, 20),
            'capacidad' => $this->faker->randomElement(['4 horas', '6 horas', '8 horas']),
            'telefono' => $this->faker->optional()->phoneNumber,
            'especialidad' => $this->faker->randomElement([
                'Medicina General', 'Pediatría', 'Cardiología',
                'Dermatología', 'Fisioterapia', 'Neurología'
            ]),
            'estado' => $this->faker->randomElement(['ACTIVO', 'INACTIVO']),
        ];
    }
}