<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller {
    
    public function index(Request $request) {
        $query = Cliente::query();
    
        if ($request->filled('nombre')) {
            $query->where('Nombre', 'like', '%' . $request->nombre . '%');
        }
    
        if ($request->filled('apellidos')) {
            $query->where('Apellidos', 'like', '%' . $request->apellidos . '%');
        }
    
        if ($request->filled('dni')) {
            $query->where('DNI', 'like', '%' . $request->dni . '%');
        }
    
        $clientes = $query->get();
    
        return view('clientes.index', compact('clientes'));
    }
    

    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'DNI' => 'required|string|max:255|unique:clientes,DNI',
            'Nacionalidad' => 'required|string|max:255',
            'Telefono' => 'required|string|max:255',
            'Fecha_nacimiento' => 'required|date',
            'Email' => 'required|string|email|max:255|unique:clientes,Email',
            'Direccion' => 'required|string|max:255',
            'Codigo_Postal' => 'required|string|max:255',
            'Ciudad' => 'required|string|max:255',
            'Pais' => 'required|string|max:255',
            'Tarjeta_Cred' => 'nullable|string'
        ]);

            $cliente = Cliente::create($validated);
        if ($cliente) {
            return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
        } else {
            return back()->withErrors(['msg' => 'Error al crear el cliente']);
        }
    }

    public function show(Cliente $cliente) {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente) {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente) {
        $validated = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'DNI' => 'required|string|max:255|unique:clientes,DNI,' . $cliente->ID_Cliente . ',ID_Cliente',
            'Nacionalidad' => 'required|string|max:255',
            'Telefono' => 'required|string|max:255',
            'Fecha_nacimiento' => 'required|date',
            'Email' => 'required|string|email|max:255|unique:clientes,Email,' . $cliente->ID_Cliente . ',ID_Cliente',
            'Direccion' => 'required|string|max:255',
            'Codigo_Postal' => 'required|string|max:255',
            'Ciudad' => 'required|string|max:255',
            'Pais' => 'required|string|max:255',
            'Tarjeta_Cred' => 'nullable|string'
        ]);

        $cliente->update($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy(Cliente $cliente) {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
}