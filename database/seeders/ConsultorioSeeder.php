<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use Illuminate\Database\Seeder;

class ConsultorioSeeder extends Seeder
{
    public function run()
    {
        Consultorio::factory()->count(10)->create();
    }
}