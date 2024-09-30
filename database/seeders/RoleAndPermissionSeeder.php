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
        $roleSuperAdmin=Role::firstOrCreate([
            'name'=>'super-admin',
        ]);

        $roleAdmin=Role::firstOrCreate([
            'name'=>'admin',
        ]);

        $roleUser=Role::firstOrCreate([
            'name'=>'simple-user',
        ]);

        Permission::firstOrCreate([
            'name'=>'crud tablas',
        ]);

        Permission::firstOrCreate([
            'name'=>'insertar pedido',
        ]);

        Permission::firstOrCreate([
            'name'=>'solicitar pedido',
        ]);

        //Roles para los super administradores
        $roleSuperAdmin->givePermissionTo('crud tablas');
        $roleSuperAdmin->givePermissionTo('insertar pedido');
        $roleSuperAdmin->givePermissionTo('solicitar pedido');

        //Roles para los administradores (empleados)
        $roleAdmin->givePermissionTo('insertar pedido');
        $roleAdmin->givePermissionTo('solicitar pedido');

        //Roles para los usuarios (clientes)
        $roleUser->givePermissionTo('solicitar pedido');
    }
}
