<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Diferentes roles
        $roleAdministrador=Role::firstOrCreate([
            'name'=>'administrador',
        ]);

        $roleEmpleado=Role::firstOrCreate([
            'name'=>'empleado',
        ]);

        $roleCliente=Role::firstOrCreate([
            'name'=>'cliente',
        ]);

        // Crear permisos
        $permissions = [
            // Permisos para clientes
            ['name' => 'actualizar cliente'],
            ['name' => 'solicitar venta'],
            
            // Permisos para empleados
            ['name' => 'crud pedido'],
            ['name' => 'crud almacenaje'],
            ['name' => 'crear cliente'],
            ['name' => 'consultar cliente'],
            ['name' => 'consultar horario'],
            ['name' => 'consultar producto'],
            ['name' => 'consultar promocion'],
            
            // Permisos para administradores
            ['name' => 'crud empleado'],
            ['name' => 'crud cliente'],
            ['name' => 'crud producto'],
            ['name' => 'crud horario'],
            ['name' => 'crud promocion'],
        ];
        
        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        //Roles para los empleados
        $roleCliente->givePermissionTo(
            'actualizar cliente',
            'solicitar venta',
        );

        //Roles para los empleados
        $roleEmpleado->givePermissionTo(
            'crud pedido',
            'crud almacenaje',
            'crear cliente',
            'consultar cliente',
            'consultar horario',
            'consultar producto',
            'consultar promocion',
        );
        
        //Roles para los administradores
        $roleAdministrador->givePermissionTo(
            'crud empleado',
            'crud pedido',
            'crud almacenaje',
            'crud cliente',
            'crud producto',
            'crud horario',
            'crud promocion',
        );

    }
}
