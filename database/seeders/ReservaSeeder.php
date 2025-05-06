<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        
        Reserva::factory()->count(100)->create();
    }
}