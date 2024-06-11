<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadosController extends Controller {
    public function index() {
        $empleados = Empleado::paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create() {
        return view('empleados.create');
    }

    public function store(Request $request) {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Apellidos' => 'required|max:255',
            'Departamento' => 'required|in:Recepcion,Pisos',
            'Usuario' => 'required|unique:empleados,Usuario',
            'Contraseña' => 'required|min:8',
            'Telefono' => 'required|max:20',
            'Email' => 'required|email|unique:empleados,Email',
            'Rol' => 'required|in:usuario,administrador',
        ]);

        $request->merge(['Contraseña' => bcrypt($request->Contraseña)]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function show(Empleado $empleado) {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado) {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado) {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Apellidos' => 'required|max:255',
            'Departamento' => 'required|in:Recepcion,Pisos',
            'Usuario' => 'required|unique:empleados,Usuario,' . $empleado->ID_Empleado . ',ID_Empleado',
            'Contraseña' => 'nullable|min:8',
            'Telefono' => 'required|max:20',
            'Email' => 'required|email|unique:empleados,Email,' . $empleado->ID_Empleado . ',ID_Empleado',
            'Rol' => 'required|in:usuario,administrador',
        ]);

        if ($request->filled('Contraseña')) {
            $request->merge(['Contraseña' => bcrypt($request->Contraseña)]);
        } else {
            $request->request->remove('Contraseña');
        }

        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado) {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}