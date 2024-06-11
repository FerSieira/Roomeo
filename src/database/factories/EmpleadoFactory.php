<?php

namespace Database\Factories;

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->firstName,
        'Apellidos' => $faker->lastName,
        'Departamento' => $faker->randomElement(['Recepcion', 'Pisos']),
        'Usuario' => $faker->userName,
        'password' => bcrypt('password'), // O cualquier contraseña que desees utilizar
        'Telefono' => $faker->phoneNumber,
        'Email' => $faker->unique()->safeEmail,
        'Rol' => $faker->randomElement(['usuario', 'administrador']),
    ];
});
