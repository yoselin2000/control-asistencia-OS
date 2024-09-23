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
        // User::create([
        //     'name' => 'Yoselin',
        //     'email' => 'yoselin@gmail.com',
        //     'password' => Hash::make('password123'), 
        // ]);

        // User::create([
        //     'name' => 'Juan',
        //     'email' => 'juan@gmail.com',
        //     'password' => Hash::make('password456'),
        // ]);

        $adminRole = Role::findByName('admin', 'web');
        $userRole = Role::findByName('user', 'web');

        // Crear el usuario admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Asignar el rol de usuario común
        $user->assignRole($userRole);
    }
}
