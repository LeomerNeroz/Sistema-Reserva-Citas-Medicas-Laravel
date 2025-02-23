<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'ci' => $this->faker->unique()->numerify('#########'),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2020-01-01'),
            'genero' => $this->faker->randomElement(['M', 'F','O']),
            'celular' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'grupo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'alergias' => $this->faker->words(3, true),
            'contacto_emergencia' => $this->faker->phoneNumber,
            'observaciones' => $this->faker->words(3, true),
        ];
    }
    
}
