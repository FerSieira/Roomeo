<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleados')->insert([
            'Nombre' => 'Admin',
            'Apellidos' => 'Usuario',
            'Departamento' => 'Recepcion',
            'Usuario' => 'Admin',
            'password' => Hash::make('VhzTmdYfg31.'),
            'Telefono' => '999999999',
            'Email' => 'admin@roomeo.es',
            'Rol' => 'administrador',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
