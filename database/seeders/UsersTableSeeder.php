<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::findByName('admin', 'web');
        $userRole = Role::findByName('user', 'web');
        $superAdminRole = Role::findByName('super admin', 'web');

        // Crear el usuario admin
        $superAdminUser = User::create([
            'name' => 'Yoselin',
            'email' => 'yoselin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $superAdminUser->assignRole($superAdminRole); // Asignar el rol de super admin al usuario
    
        // Crear el usuario admin
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole($adminRole); // Asignar el rol de admin al usuario
    
        // Crear el usuario regular
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $regularUser->assignRole($userRole);
    }
}
