<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $client = User::firstOrCreate(
        ['email' => 'Omara@example.com'],
        [
            'name' => 'client',
            'password' => Hash::make('123456789'),
        ]
    );


        // Crear roles si no existen
        $clientRole = Role::firstOrCreate(['name' => 'client']);

        // Asignar roles a los usuarios
        $client->assignRole($clientRole);

        // Mensajes de éxito
        $this->command->info('Client user creado con éxito.');


    }
}
