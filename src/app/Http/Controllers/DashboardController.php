<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        $hoy = Carbon::today();

        $reservasPendientesHoy = Reserva::where('Estado', 'pendiente')
            ->whereDate('Fecha_Llegada', $hoy)
            ->count();

        $salidasHoy = Reserva::where('Estado', 'en curso')
            ->whereDate('Fecha_Salida', $hoy)
            ->count();

        $clientesHospedados = Reserva::where('Estado', 'en curso')
            ->where('Fecha_Llegada', '<=', $hoy)
            ->where('Fecha_Salida', '>=', $hoy)
            ->count();

        $habitacionesLibres = Habitacion::where('estado', 'Libre')->count();
        $habitacionesOcupadas = Habitacion::where('estado', 'Ocupada')->count();
        $habitacionesSucias = Habitacion::where('estado', 'Sucia')->count();
        $habitacionesBloqueadas = Habitacion::where('estado', 'Bloqueada')->count();

        return view('dashboard', compact(
            'reservasPendientesHoy',
            'salidasHoy',
            'clientesHospedados',
            'habitacionesLibres',
            'habitacionesOcupadas',
            'habitacionesSucias',
            'habitacionesBloqueadas'
        ));
    }
}
