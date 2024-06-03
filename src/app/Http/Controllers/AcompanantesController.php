<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acompanante;
use Carbon\Carbon;

class AcompanantesController extends Controller {
    public function index() {
        $acompanantes = Acompanante::all();
        return view('acompanantes.index', compact('acompanantes'));
    }

    public function create() {
        return view('acompanantes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Apellidos' => 'required|max:255',
            'Codigo_Postal' => 'required|max:10',
            'DNI' => 'required|max:20',
            'fecha_nac' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),
            'nacionalidad' => 'required|max:255',
            'direccion' => 'required|max:255',
            'pais' => 'required|max:255',
            'ciudad' => 'required|max:255',
        ]);
    
        $acompananteData = $request->all();
        $acompananteData['fecha_nac'] = date('Y-m-d', strtotime($request->fecha_nac));
    
        Acompanante::create($acompananteData);
    
        return redirect()->route('acompanantes.index')->with('success', 'Acompañante creado correctamente.');
    }

    public function show(Acompanante $acompanante) {
        return view('acompanantes.show', compact('acompanante'));
    }

    public function edit(Acompanante $acompanante) {
        return view('acompanantes.edit', compact('acompanante'));
    }

    public function update(Request $request, Acompanante $acompanante) {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Apellidos' => 'required|max:255',
            'Codigo_Postal' => 'required|max:10',
            'DNI' => 'required|max:20',
            'fecha_nac' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),
            'nacionalidad' => 'required|max:255',
            'direccion' => 'required|max:255',
            'pais' => 'required|max:255',
            'ciudad' => 'required|max:255',
        ]);

        $acompanante->fill($request->all());
        $acompanante->fecha_nac = date('Y-m-d', strtotime($request->fecha_nac));
        $acompanante->save();

        return redirect()->route('acompanantes.index')->with('success', 'Acompañante actualizado correctamente.');
    }

    public function destroy(Acompanante $acompanante) {
        $acompanante->delete();
        return redirect()->route('acompanantes.index')->with('success', 'Acompañante eliminado correctamente.');
    }
}
