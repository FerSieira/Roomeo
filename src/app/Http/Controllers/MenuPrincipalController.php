<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Habitacion;

// Cree este controller para el dashboard que hago al inicio donde muestro una especie de room status del hotel para que los empleados
// Nada mas abrir la app vean como esta el hotel en un golpe de vista
class MenuPrincipalController extends Controller {
    public function index() {
        $hoy = now()->toDateString();
        $reservasInicioHoy = Reserva::whereDate('Fecha_Llegada', $hoy)->count();
        $reservasFinHoy = Reserva::whereDate('Fecha_Salida', $hoy)->count();
        $totalHabitaciones = Habitacion::count();
        $habitacionesDisponibles = Habitacion::where('estado', 'Libre')->count();
        $habitacionesOcupadas = Habitacion::where('estado', 'Ocupada')->count();
        $habitacionesSucias = Habitacion::where('estado', 'Sucia')->count();

        return view('menuprincipal', compact('reservasInicioHoy', 'reservasFinHoy', 'totalHabitaciones', 'habitacionesDisponibles', 'habitacionesOcupadas', 'habitacionesSucias'));
    }
}