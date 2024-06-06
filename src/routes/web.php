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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturasController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [MenuPrincipalController::class, 'index'])->name('home');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // Rutas accesibles para todos los usuarios autentigficados
    Route::resource('reservas', ReservasController::class);
    // OJO!!! En el caso de habitacion tuve que especificar el parametro explicitamente porque por algun motivo me estaba pasando todo el rato habitacione
    // sin la S y no habia otra manera de solucionarlo HAY LIMITACION DE CARACTERES DE UN PARAMETRO EN LARAVEL???
    Route::resource('habitaciones', HabitacionesController::class)->parameters([
        'habitaciones' => 'habitacion'
    ]);
    
    Route::resource('clientes', ClientesController::class);
    Route::resource('acompanantes', AcompanantesController::class);
    Route::resource('servicios', ServiciosController::class);
    Route::resource('reserva_servicios', ReservaServiciosController::class);
    Route::get('/reservas/habitaciones/{idTipoHab}', [ReservasController::class, 'getHabitacionesPorTipo']);
    Route::patch('/reservas/{reserva}/checkin', [ReservasController::class, 'checkIn'])->name('reservas.checkin');
    Route::patch('/reservas/{reserva}/checkout', [ReservasController::class, 'checkOut'])->name('reservas.checkout');
    Route::patch('/reservas/{habitacion}/limpiar', [ReservasController::class, 'limpiar'])->name('reservas.limpiar');
    Route::get('/facturas', [FacturasController::class, 'index'])->name('facturas.index');
    Route::get('/facturas/{factura}', [FacturasController::class, 'show'])->name('facturas.show');
    Route::resource('facturas', FacturasController::class)->only(['index', 'show']);

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

