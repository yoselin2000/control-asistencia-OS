<?php

namespace Database\Seeders;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UsersTableSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RolesAndPermissionsSeeder::class, // Crear roles y permisos primero
            UsersTableSeeder::class, // Luego asignar roles a usuarios
        ]);
    }
}
