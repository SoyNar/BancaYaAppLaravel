<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin= Role::create(['name'=> 'admin']);
        $advisor=  Role::create(['name'=> 'advisor']);
        $client= Role::create(['name'=> 'client']);

        /**
         * crear todos los permisos en un array
         */
        $permissions = [
            'user.create', 'user.destroy', 'user.edit', 'user.show',
            'turn.create', 'turn.destroy', 'turn.edit', 'turn.show',
            'role.create', 'role.destroy', 'role.edit', 'role.show',
            'turn.purchase'
        ];

        /**
         * crear los permisos y buscarlos en la base de datos
         */
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        /**
         * Asignando permisos a cada rol
         */
        $admin->syncPermissions($permissions);


        $advisor->syncPermissions([
            'turn.create',
            'turn.edit',
            'turn.show',
            'turn.purchase',
        ]);

        $client->syncPermissions([
            'turn.show',
            'turn.purchase',
        ]);
    }
}
