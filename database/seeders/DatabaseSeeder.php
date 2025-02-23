<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Secretaria;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        $this->call([RoleSeeder::class]);

        
        $userAdmin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'administrador',
            'password' => Hash::make('12345678'),
        ]);
        $userAdmin->assignRole('admin');

        $userSecretaria = User::firstOrCreate([
            'email' => 'secretaria@admin.com',
        ], [
            'name' => 'secretaria',
            'password' => Hash::make('12345678'),
        ]);
        $userSecretaria->assignRole('secretaria');

        
        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => '1',
            'ci' => '11111111',
            'celular' => '778787788',
            'fecha_nacimiento' => '2000-10-10',
            'direccion' => 'zona por aquí y luego más allá',
            'user_id' => $userSecretaria->id,
        ]);

        Doctor::create([


            'nombres' => 'Doctor1',
            'apellidos' => 'house',
            'telefono' => '+584127044823',
            'email' => 'doctore@ejemplo.com',
            'especialidad' => 'fisioterapia',

        ]);


        Consultorio::create([

        'nombre' => 'el mas grande',
        'capacidad' => '10',
        'especialidad' => 'fisioterapia',
        'estado' => 'ACTIVO',

        ]);


        

        

        $this->call([PacienteSeeder::class]);

        $this->call([
            EventSeeder::class
        ]);
    }
}
