<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TarifasController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\AcompanantesController;
use App\Http\Controllers\ReservaServiciosController;

Route::get('/', [MenuPrincipalController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas accesibles para todos los usuarios autentificados
    Route::resource('reservas', ReservasController::class);
    // OJO!!! En el caso de habitacion tuve que especificar el parametro explicitamente porque por algun motivo me estaba pasando todo el rato habitacione
    // sin la S y no habia otra manera de solucionarlo PREGUNTAR ROCIO? HAY LIMITACION DE CARACTERES DE UN PARAMETRO EN LARAVEL???
    Route::resource('habitaciones', HabitacionesController::class)->parameters([
        'habitaciones' => 'habitacion'
    ]);
    
    Route::resource('clientes', ClientesController::class);
    Route::resource('acompanantes', AcompanantesController::class);
    Route::resource('servicios', ServiciosController::class);
    Route::resource('reserva_servicios', ReservaServiciosController::class);

    // Rutas accesibles solo para administradores
    Route::middleware(['admin'])->group(function () {
        Route::resource('empleados', EmpleadosController::class);
        Route::resource('tarifas', TarifasController::class);
        Route::resource('tipohabitaciones', TipoHabitacionController::class)->parameters([
            'tipohabitaciones' => 'tipohabitacion'
        ]);
        
    });
});

require __DIR__.'/auth.php';

