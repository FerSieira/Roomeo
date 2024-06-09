<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class HabitacionesController extends Controller {
    public function index() {
        $habitaciones = Habitacion::paginate(10);
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function create() {
        $tipos = TipoHabitacion::all();
        return view('habitaciones.create', compact('tipos'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'Num_hab' => 'required|string|max:255',
            'Planta' => 'required|integer',
            'Estado' => 'required|string',
            'ID_Tipo_Hab' => 'required|exists:tipo_habitaciones,ID_Tipo_Hab'
        ]);

        Habitacion::create($validated);
        return redirect()->route('habitaciones.index')->with('success', 'Habitación creada con éxito.');
    }

    public function show(Habitacion $habitacion) {
        return view('habitaciones.show', compact('habitacion'));
    }

    public function edit(Habitacion $habitacion) {
        $tipos = TipoHabitacion::all();
        return view('habitaciones.edit', compact('habitacion', 'tipos'));
    }

public function update(Request $request, Habitacion $habitacion) {
    $validated = $request->validate([
        'Num_hab' => 'required|string|max:255',
        'Planta' => 'required|integer',
        'Estado' => 'required|string',
        'ID_Tipo_Hab' => 'required|exists:tipo_habitaciones,ID_Tipo_Hab'
    ]);

    $habitacion->update($validated);
    return redirect()->route('habitaciones.index')->with('success', 'Habitación actualizada con éxito.');
}

    public function destroy(Habitacion $habitacion) {
        $habitacion->delete();
        return redirect()->route('habitaciones.index')->with('success', 'Habitación eliminada con éxito.');
    }
}