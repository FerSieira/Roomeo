<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Utiliza el factory para crear un único empleado
        Empleado::factory()->create([
            'Nombre' => 'Admin',
            'Apellidos' => 'Usuario',
            'Departamento' => 'Recepcion',
            'Usuario' => 'Admin',
            'password' => bcrypt('VhzTmdYfg31.'), // O cualquier contraseña que desees utilizar
            'Telefono' => '999999999',
            'Email' => 'admin@roomeo.es',
            'Rol' => 'administrador',
        ]);
    }
}