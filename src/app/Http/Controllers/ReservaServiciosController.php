<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservaServicio;
use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\Empleado;
use Illuminate\Support\Facades\Log;

class ReservaServiciosController extends Controller {
    public function index() {
        $reservaServicios = ReservaServicio::with(['reserva', 'servicio', 'empleado'])->get();
        return view('reserva_servicios.index', compact('reservaServicios'));
    }

    public function create() {
        $reservas = Reserva::all();
        $servicios = Servicio::all();
        $empleados = Empleado::all();
        return view('reserva_servicios.create', compact('reservas', 'servicios', 'empleados'));
    }

    public function store(Request $request) {
        $request->validate([
            'ID_Reserva' => 'required|exists:reservas,ID_Reservas',
            'ID_Servicio' => 'required|exists:servicios,ID_Servicio',
            'ID_Empleado' => 'required|exists:empleados,ID_Empleado',
            'Dia_Hora' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Conveirto el campo diahora al formato Ymd His
        $data = $request->all();
        $data['Dia_Hora'] = date('Y-m-d H:i:s', strtotime($data['Dia_Hora']));

        ReservaServicio::create($data);

        return redirect()->route('reserva_servicios.index')->with('success', 'Servicio reservado correctamente.');
    }


    public function show(ReservaServicio $reservaServicio) {
        return view('reserva_servicios.show', compact('reservaServicio'));
    }

    public function edit(ReservaServicio $reservaServicio) {
        $reservas = Reserva::all();
        $servicios = Servicio::all();
        $empleados = Empleado::all();
        return view('reserva_servicios.edit', compact('reservaServicio', 'reservas', 'servicios', 'empleados'));
    }

    public function update(Request $request, ReservaServicio $reservaServicio) {
        $request->validate([
            'ID_Reserva' => 'required|exists:reservas,ID_Reservas',
            'ID_Servicio' => 'required|exists:servicios,ID_Servicio',
            'ID_Empleado' => 'required|exists:empleados,ID_Empleado',
            'Dia_Hora' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Mismo que en el metodo store
        $data = $request->all();
        $data['Dia_Hora'] = date('Y-m-d H:i:s', strtotime($data['Dia_Hora']));

        $reservaServicio->update($data);

        return redirect()->route('reserva_servicios.index')->with('success', 'Reserva de servicio actualizada correctamente.');
    }


    public function destroy(ReservaServicio $reservaServicio)
    {
        $reservaServicio->delete();
        return redirect()->route('reserva_servicios.index')->with('success', 'Reserva de servicio eliminada correctamente.');
    }
}