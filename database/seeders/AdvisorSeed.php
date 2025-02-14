<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdvisorSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $advisor = User::firstOrCreate(
            ['email' => 'nara@example.com'],

            [
                'name' => 'nar',
                'password' => Hash::make('123456789'),
                'advisor_status' => 'AVAILABLE',
            ]
        );


        // Crear roles si no existen
        $advisorRole = Role::firstOrCreate(['name' => 'advisor']);

        // Asignar roles a los usuarios
        $advisor->assignRole($advisorRole);

        // Mensajes de éxito
        $this->command->info('asesor user creado con éxito.');

    }
}
