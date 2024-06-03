<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Tarifa;
use App\Models\Cliente;
use App\Models\TipoHabitacion;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ReservasController extends Controller {
    
    public function index(Request $request) {
        $query = Reserva::with(['cliente', 'habitacion']);
    
        if ($request->filled('fecha_inicio')) {
            $query->whereDate('Fecha_Llegada', $request->fecha_inicio);
        } elseif (!$request->filled('ver_todas')) {
            $query->whereDate('Fecha_Llegada', '>=', Carbon::today());
        }
    
        if ($request->filled('nombre_cliente')) {
            $query->whereHas('cliente', function($q) use ($request) {
                $q->where('Nombre', 'like', '%' . $request->nombre_cliente . '%')
                  ->orWhere('Apellidos', 'like', '%' . $request->nombre_cliente . '%');
            });
        }
    
        $reservas = $query->get();
    
        return view('reservas.index', compact('reservas'));
    }

     public function create() {
        $clientes = Cliente::all();
        $tipoHabitaciones = TipoHabitacion::all();
        $habitaciones = Habitacion::where('estado', 'Libre')->get();
        $tarifas = Tarifa::all();

        return view('reservas.create', compact('clientes', 'tipoHabitaciones', 'habitaciones', 'tarifas'));
    }

     public function store(Request $request) {
         
         $validatedData = $request->validate([
             'Fecha_Llegada' => 'required|date|after_or_equal:today',
             'Fecha_Salida' => 'required|date|after:Fecha_Llegada',
             'Adultos' => 'required|integer|min:1',
             'Ninos' => 'nullable|integer|min:0',
             'Solicitudes' => 'nullable|string|max:255',
             'Estado' => 'required|in:pendiente,confirmada,cancelada,completada,en curso',
             'hora_entra' => 'nullable|date_format:H:i',
             'hora_sale' => 'nullable|date_format:H:i',
             'ID_Tipo_Hab' => 'required|exists:tipo_habitaciones,ID_Tipo_Hab',
             'ID_Habitacion' => 'required|exists:habitaciones,ID_Habitacion',
             'ID_Tarifa' => 'required|exists:tarifas,ID_Tarifa'
         ]);
     
         // Valido los datos del cliente si es nuevo
         if ($request->input('cliente_tipo') == 'nuevo') {
             $validatedClienteData = $request->validate([
                 'nuevo_cliente.Nombre' => 'required|string|max:255',
                 'nuevo_cliente.Apellidos' => 'required|string|max:255',
                 'nuevo_cliente.DNI' => 'required|string|max:255|unique:clientes,DNI',
                 'nuevo_cliente.Nacionalidad' => 'required|string|max:255',
                 'nuevo_cliente.Telefono' => 'required|string|max:255',
                 'nuevo_cliente.Fecha_nacimiento' => 'required|date',
                 'nuevo_cliente.Email' => 'required|string|email|max:255|unique:clientes,Email',
                 'nuevo_cliente.Direccion' => 'required|string|max:255',
                 'nuevo_cliente.Codigo_Postal' => 'required|string|max:255',
                 'nuevo_cliente.Ciudad' => 'required|string|max:255',
                 'nuevo_cliente.Pais' => 'required|string|max:255',
                 'nuevo_cliente.Tarjeta_Cred' => 'nullable|string'
             ]);
     
             // Creamos un nuevo cliente desde resva tambien
             $cliente = Cliente::create($validatedClienteData['nuevo_cliente']);
             $validatedData['ID_Cliente'] = $cliente->ID_Cliente;
         } else {
             $validatedData['ID_Cliente'] = $request->input('ID_Cliente');
         }
     
         $acompanantesData = $request->input('acompanantes', []);

         $reserva = Reserva::create($validatedData);
     
         // Creo y relaciono los acompañantes
         foreach ($acompanantesData as $acompananteData) {
             $acompanante = Acompanante::create($acompananteData);
             $reserva->acompanantes()->attach($acompanante->ID_Acompanante);
         }
     
         return redirect()->route('reservas.index')->with('success', 'Reserva creada con éxito.');
     }
     
    public function show($id) {
        $reserva = Reserva::findOrFail($id);

        // !!! OJO Convierto las fechas a instacias de Carbon porque sino salta error 
        // Carbon es una biblioteca de manipulacion de fechas y horas (Supuestamente del propio PHP?)
        $reserva->Fecha_Llegada = Carbon::parse($reserva->Fecha_Llegada);
        $reserva->Fecha_Salida = Carbon::parse($reserva->Fecha_Salida);

        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva) {
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva) {
        $validatedData = $request->validate([
            'Fecha_Llegada' => 'required|date|after_or_equal:today',
            'Fecha_Salida' => 'required|date|after:Fecha_Llegada',
            'Adultos' => 'required|integer|min:1',
            'Ninos' => 'nullable|integer|min:0',
            'Solicitudes' => 'nullable|string|max:255',
            'Estado' => 'required|in:pendiente,confirmada,cancelada,completada,en curso',
            'hora_entra' => 'nullable|date_format:H:i',
            'hora_sale' => 'nullable|date_format:H:i',
            'ID_Cliente' => 'required|exists:clientes,ID_Cliente',
            'ID_Habitacion' => 'required|exists:habitaciones,ID_Habitacion',
            'ID_Tipo_Hab' => 'required|exists:tipo_habitaciones,ID_Tipo_Hab',
            'ID_Tarifa' => 'required|exists:tarifas,ID_Tarifa'
        ], [
            // Le pongo esto para que salten estos mensajes cuando no se cumplan estas condiciones
            'Fecha_Llegada.required' => 'La fecha de llegada es obligatoria.',
            'Fecha_Salida.after' => 'La fecha de salida debe ser posterior a la fecha de llegada.'
        ]);
        

        $reserva->update($validatedData);
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada con éxito.');
    }
    
    public function destroy(Reserva $reserva) {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada con éxito.');
    }
}