<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $permissions = [
            'admin.usuarios.index',
            'admin.usuarios.store',
            'admin.usuarios.show',
            'admin.usuarios.edit',
            'admin.usuarios.update',
            'admin.usuarios.confirmDelete',
            'admin.usuarios.destroy',
            'admin.secretarias.index',
    
            'admin.pacientes.index',
            'admin.pacientes.create',
            'admin.pacientes.store',
            'admin.pacientes.show',
            'admin.pacientes.edit',
            'admin.pacientes.update',
            'admin.pacientes.confirmDelete',
            'admin.pacientes.destroy',
            'admin.consultorios.index',
            'admin.consultorios.create',
            'admin.consultorios.store',
            'admin.consultorios.show',
            'admin.consultorios.edit',
            'admin.consultorios.update',
            'admin.consultorios.confirmDelete',
            'admin.consultorios.destroy',
            'admin.doctores.index',
            'admin.doctores.create',
            'admin.doctores.store',
            'admin.doctores.show',
            'admin.doctores.edit',
            'admin.doctores.update',
            'admin.doctores.confirmDelete',
            'admin.doctores.destroy',
            'admin.doctores.reportes',
            'admin.doctores.pdf',
            'admin.horarios.index',
            'admin.horarios.create',
            'admin.horarios.store',
            'admin.horarios.show',
            'admin.horarios.edit',
            'admin.horarios.update',
            'admin.horarios.confirmDelete',
            'admin.horarios.destroy',
            'admin.horarios.cargar_datos_consultorios',
            'admin.reservas.index',
            'admin.reservas.create',
            'admin.reservas.store',
            'admin.reservas.show',
            'admin.reservas.edit',
            'admin.reservas.update',
            'admin.reservas.confirmDelete',
            'admin.reservas.destroy',
            
           
            'admin.historial.index',
            'admin.historial.create',
            'admin.historial.store',
            'admin.historial.show',
            'admin.historial.edit',
            'admin.historial.update',
            'admin.historial.confirm-delete',
            'admin.historial.destroy',
            'admin.historial.pdf',
            'admin.historial.buscar_paciente',
            'admin.historial.imprimir_historial'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $secretaria = Role::firstOrCreate(['name' => 'secretaria']);

      
        $admin->givePermissionTo($permissions);

        
        $secretariaPermissions = [
            'admin.pacientes.index',
            'admin.pacientes.create',
            'admin.pacientes.store',
            'admin.pacientes.show',
            'admin.pacientes.edit',
            'admin.pacientes.update',
            'admin.pacientes.confirmDelete',
            'admin.pacientes.destroy',
            'admin.consultorios.index',
            'admin.consultorios.create',
            'admin.consultorios.store',
            'admin.consultorios.show',
            'admin.consultorios.edit',
            'admin.consultorios.update',
            'admin.consultorios.confirmDelete',
            'admin.consultorios.destroy',
            'admin.doctores.index',
            'admin.doctores.create',
            'admin.doctores.store',
            'admin.doctores.show',
            'admin.doctores.edit',
            'admin.doctores.update',
            'admin.doctores.confirmDelete',
            'admin.doctores.destroy',
            'admin.doctores.reportes',
            'admin.doctores.pdf',
            'admin.horarios.index',
            'admin.horarios.create',
            'admin.horarios.store',
            'admin.horarios.show',
            'admin.horarios.edit',
            'admin.horarios.update',
            'admin.horarios.confirmDelete',
            'admin.horarios.destroy',
            'admin.horarios.cargar_datos_consultorios',
            'admin.reservas.index',
            'admin.reservas.create',
            'admin.reservas.store',
            'admin.reservas.show',
            'admin.reservas.edit',
            'admin.reservas.update',
            'admin.reservas.confirmDelete',
            'admin.reservas.destroy',
            
            'admin.historial.index',
            'admin.historial.create',
            'admin.historial.store',
            'admin.historial.show',
            'admin.historial.edit',
            'admin.historial.update',
            'admin.historial.confirm-delete',
            'admin.historial.destroy',
            'admin.historial.pdf',
            'admin.historial.buscar_paciente',
            'admin.historial.imprimir_historial'

        ];

        $secretaria->givePermissionTo($secretariaPermissions);
    }
}
