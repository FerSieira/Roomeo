<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServiciosController extends Controller {
    public function index() {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    public function create() {
        return view('servicios.create');
    }

    public function store(Request $request) {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Descripcion' => 'required',
            'Activo' => 'required|boolean',
            'Precio' => 'required|numeric',
        ]);

        Servicio::create($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    public function show(Servicio $servicio) {
        return view('servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio) {
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, Servicio $servicio) {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Descripcion' => 'required',
            'Activo' => 'required|boolean',
            'Precio' => 'required|numeric',
        ]);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Servicio $servicio) {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}