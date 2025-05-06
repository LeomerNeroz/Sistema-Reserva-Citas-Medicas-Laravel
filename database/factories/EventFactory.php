<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = \App\Models\Event::class;

    public function definition()
    {
       
        $startDate = $this->faker->dateTimeBetween('now', '+60 days');
        $endDate = (clone $startDate)->modify('+1 hour');

        return [
            'title' => $this->faker->sentence(3), 
            'start' => $startDate->format('Y-m-d H:i:s'),
            'end' => $endDate->format('Y-m-d H:i:s'),
            'all_day' => $this->faker->boolean(20), 
        ];
    }
}