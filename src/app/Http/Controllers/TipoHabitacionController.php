<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoHabitacion;

class TipoHabitacionController extends Controller {
    public function index() {
        $tiposHabitacion = TipoHabitacion::all();
        return view('tipo_habitaciones.index', compact('tiposHabitacion'));
    }

    public function create() {
        return view('tipo_habitaciones.create');
    }

    public function store(Request $request) {
        $request->validate([
            'Nombre_Tipo' => 'required|max:255',
            'Descripcion' => 'required',
            'Capacidad' => 'required|integer',
        ]);

        TipoHabitacion::create($request->all());

        return redirect()->route('tipohabitaciones.index')->with('success', 'Tipo de Habitación creado correctamente.');
    }

    public function show(TipoHabitacion $tipohabitacion) {
        return view('tipo_habitaciones.show', compact('tipohabitacion'));
    }

    public function edit(TipoHabitacion $tipohabitacion) {
        return view('tipo_habitaciones.edit', compact('tipohabitacion'));
    }

    public function update(Request $request, TipoHabitacion $tipohabitacion) {
        $request->validate([
            'Nombre_Tipo' => 'required|max:255',
            'Descripcion' => 'required',
            'Capacidad' => 'required|integer',
        ]);

        $tipohabitacion->update($request->all());

        return redirect()->route('tipohabitaciones.index')->with('success', 'Tipo de Habitación actualizado correctamente.');
    }

    public function destroy(TipoHabitacion $tipohabitacion) {
        $tipohabitacion->delete();
        return redirect()->route('tipohabitaciones.index')->with('success', 'Tipo de Habitación eliminado correctamente.');
    }
}