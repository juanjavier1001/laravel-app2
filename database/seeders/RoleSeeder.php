<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$rolAdmin = Role::create(['name' => 'admin'])->givePermissionTo("miembros jc");

        $rolAdmin = Role::create(['name' => 'admin']);
        $rolInvitado = Role::create(['name' => 'invitado']);

        //permisos miembros
        Permission::create(['name' => 'Gestionar Miembros'])->syncRoles([$rolAdmin]);

        //permisos ministerios
        Permission::create(['name' => 'Gestionar Ministerios'])->assignRole($rolAdmin);;

        //permisos asistencias
        Permission::create(['name' => 'Gestionar Asistencias'])->assignRole($rolAdmin);

        //permisos reportes
        Permission::create(['name' => 'Gestionar Reportes'])->assignRole($rolAdmin);;

        //permisos reportes
        Permission::create(['name' => 'Gestionar Roles'])->assignRole($rolAdmin);;

        //permisos reportes
        Permission::create(['name' => 'Gestionar Permisos'])->assignRole($rolAdmin);;
    }
}
