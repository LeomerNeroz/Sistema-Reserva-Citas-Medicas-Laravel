<?php

namespace Database\Seeders;

use App\Models\Historial;
use Illuminate\Database\Seeder;

class HistorialSeeder extends Seeder
{
    public function run()
    {
       
        Historial::factory()->count(200)->create();
    }
}