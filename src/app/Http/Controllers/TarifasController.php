<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;

class TarifasController extends Controller {
 
    public function index()
    {
        $tarifas = Tarifa::all();
        return view('tarifas.index', compact('tarifas'));
    }
 
    public function create() {
        return view('tarifas.create');
    }
 
    public function store(Request $request) {
        $validatedData = $request->validate([
            'DescripcionTar' => 'required|string|max:255',
            'Desde' => 'required|date',
            'Hasta' => 'required|date',
            'Precio' => 'required|numeric',
            'Ocupacion' => 'required|integer|min:0|max:100'
        ]);

        Tarifa::create($validatedData);
        return redirect()->route('tarifas.index')->with('success', 'Tarifa creada con éxito.');
    }
 
    public function show(Tarifa $tarifa) {
        return view('tarifas.show', compact('tarifa'));
    } 

    public function edit(Tarifa $tarifa) {
        return view('tarifas.edit', compact('tarifa'));
    }

    public function update(Request $request, Tarifa $tarifa) {
        $validatedData = $request->validate([
            'DescripcionTar' => 'required|string|max:255',
            'Desde' => 'required|date',
            'Hasta' => 'required|date',
            'Precio' => 'required|numeric',
            'Ocupacion' => 'required|integer|min:0|max:100'
        ]);

        $tarifa->update($validatedData);
        return redirect()->route('tarifas.index')->with('success', 'Tarifa actualizada con éxito.');
    }
 
    public function destroy(Tarifa $tarifa) {
        $tarifa->delete();
        return redirect()->route('tarifas.index')->with('success', 'Tarifa eliminada con éxito.');
    }
}
