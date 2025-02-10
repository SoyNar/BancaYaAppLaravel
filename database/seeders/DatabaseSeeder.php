<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear o encontrar el usuario administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456789'),
            ]
        );

        // Crear o encontrar el usuario organizer
        $organizer = User::firstOrCreate(
            ['email' => 'mariana@example.com'],
            [
                'name' => 'Mariana',
                'password' => Hash::make('123456789'),
            ]
        );

        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $advisorRole = Role::firstOrCreate(['name' => 'advisor']);

        // Asignar roles a los usuarios
        $admin->assignRole($adminRole);
        $organizer->assignRole($advisorRole);

        // Mensajes de éxito
        $this->command->info('Admin user creado con éxito.');
        $this->command->info('Asesora  creada con éxito.');

    }
}
