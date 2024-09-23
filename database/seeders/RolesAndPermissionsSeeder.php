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
        Permission::create(['name' => 'view all attendances']);

        // Crear rol de administrador con todos los permisos
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Crear rol de usuario común con permisos limitados
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['mark entry', 'mark exit']);

        // Asignar roles a usuarios
        $user = User::find(1); 
        if ($user) {
            $user->assignRole('admin'); // Asignar rol de admin al usuario con ID 1
        }

        $anotherUser = User::find(2); 
        if ($anotherUser) {
            $anotherUser->assignRole('user'); // Asignar rol de usuario común al usuario con ID 2
        }
    }
}
