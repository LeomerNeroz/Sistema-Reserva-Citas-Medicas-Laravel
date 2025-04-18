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
            
            'user_id' => $userSecretaria->id,
        ]);

        
    }
}
