<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    protected $model = \App\Models\Doctor::class;

    public function definition()
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'especialidad' => $this->faker->randomElement([
                'Medicina General', 'Pediatría', 'Cardiología',
                'Dermatología', 'Fisioterapia', 'Neurología'
            ]),
        ];
    }
}