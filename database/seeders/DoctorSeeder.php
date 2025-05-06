<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run()
    {

        // Crea 10 doctores falsos
        Doctor::factory()->count(50)->create();
    }
}