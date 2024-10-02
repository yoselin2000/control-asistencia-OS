<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'mark entry']);
        Permission::create(['name' => 'mark exit']);
        Permission::create(['name' => 'view reports']);

        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $superAdminRole = Role::create(['name' => 'super admin']);

        // Asignar permisos a los roles
        $adminRole->givePermissionTo(['mark entry', 'mark exit', 'view reports']);
        $userRole->givePermissionTo(['mark entry', 'mark exit']);
        $superAdminRole->givePermissionTo(Permission::all()); 
    }
}
