<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'title' => 'Cita #1',
            'start' => '2025-03-16 08:00:00',
            'end' => '2025-03-16 11:00:00',
            'all_day' => false,
        ]);

        Event::create([
            'title' => 'Cita #2',
            'start' => '2025-03-17 14:00:00',
            'end' => '2025-03-17 15:00:00',
            'all_day' => false,
        ]);
    }
}
