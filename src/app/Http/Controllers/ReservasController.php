<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Tarifa;
use App\Models\Cliente;
use App\Models\TipoHabitacion;
use App\Models\Acompanante;
use App\Models\Factura;
use App\Models\ReservaServicio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller {

    public function index(Request $request) {
        $query = Reserva::with(['cliente', 'habitacion']);
        
        if ($request->filled('fecha_inicio')) {
            $query->whereDate('Fecha_Llegada', $request->fecha_inicio);
        } elseif (!$request->has('ver_todas')) {
            $query->whereDate('Fecha_Llegada', '>=', Carbon::today());
        }
        
        if ($request->filled('nombre_cliente')) {
            $query->whereHas('cliente', function($q) use ($request) {
                $q->where('Nombre', 'like', '%' . $request->nombre_cliente . '%')
                  ->orWhere('Apellidos', 'like', '%' . $request->nombre_cliente . '%');
            });
        }
        
        $reservas = $query->orderBy('Fecha_Llegada')->paginate(10);
        
        $totalHabitaciones = Habitacion::count();
        $ocupadas = Habitacion::where('estado', 'Ocupada')->count();
        $libres = $totalHabitaciones - $ocupadas;
    
        $reservasEstados = Reserva::select(DB::raw('count(*) as count, Estado'))
            ->groupBy('Estado')
            ->pluck('count', 'Estado')->toArray();
        
        return view('reservas.index', compact('reservas', 'ocupadas', 'libres', 'reservasEstados'));
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
    
            $cliente = Cliente::create($validatedClienteData['nuevo_cliente']);
            $validatedData['ID_Cliente'] = $cliente->ID_Cliente;
        } else {
            $validatedData['ID_Cliente'] = $request->input('ID_Cliente');
        }
    
        $reserva = Reserva::create($validatedData);
    
        $acompanantesData = $request->input('acompanantes', []);
        foreach ($acompanantesData as $acompananteData) {
            $acompanante = Acompanante::create($acompananteData);
            $reserva->acompanantes()->attach($acompanante->ID_Acompanante);
        }
    
        return redirect()->route('reservas.index')->with('success', 'Reserva creada con éxito.');
    }

    public function show($id) {
        $reserva = Reserva::findOrFail($id);
        
        // Convertir las fechas a instancias de Carbon
        $reserva->Fecha_Llegada = Carbon::parse($reserva->Fecha_Llegada);
        $reserva->Fecha_Salida = Carbon::parse($reserva->Fecha_Salida);

        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva) {
        $clientes = Cliente::all();
        $tipoHabitaciones = TipoHabitacion::all();
        $habitaciones = Habitacion::all();
        $tarifas = Tarifa::all();
        $acompanantes = $reserva->acompanantes;

        $reserva->Fecha_Llegada = Carbon::parse($reserva->Fecha_Llegada);
        $reserva->Fecha_Salida = Carbon::parse($reserva->Fecha_Salida);

        foreach ($acompanantes as $acompanante) {
            $acompanante->fecha_nac = Carbon::parse($acompanante->fecha_nac);
        }

        return view('reservas.edit', compact('reserva', 'clientes', 'tipoHabitaciones', 'habitaciones', 'tarifas', 'acompanantes'));
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

    public function getHabitacionesPorTipo($idTipoHab, Request $request) {
        $fechaLlegada = $request->input('Fecha_Llegada');
        $fechaSalida = $request->input('Fecha_Salida');
    
        $habitacionesReservadas = Reserva::where('ID_Tipo_Hab', $idTipoHab)
            ->where(function($query) use ($fechaLlegada, $fechaSalida) {
                $query->whereBetween('Fecha_Llegada', [$fechaLlegada, $fechaSalida])
                    ->orWhereBetween('Fecha_Salida', [$fechaLlegada, $fechaSalida])
                    ->orWhereRaw('? BETWEEN Fecha_Llegada AND Fecha_Salida', [$fechaLlegada])
                    ->orWhereRaw('? BETWEEN Fecha_Llegada AND Fecha_Salida', [$fechaSalida]);
            })
            ->pluck('ID_Habitacion');
    
        $habitacionesDisponibles = Habitacion::where('ID_Tipo_Hab', $idTipoHab)
            ->where('Estado', 'Libre')
            ->whereNotIn('ID_Habitacion', $habitacionesReservadas)
            ->get();
    
        return response()->json($habitacionesDisponibles);
    }
    

    public function checkIn($id) {
        $reserva = Reserva::findOrFail($id);
    
        if ($reserva->Estado == 'completada' || $reserva->Estado == 'en curso') {
            return redirect()->route('reservas.index')->with('error', 'No se puede hacer check-in en esta reserva.');
        }
    
        $reserva->Estado = 'en curso';
        $reserva->save();
    
        $habitacion = Habitacion::findOrFail($reserva->ID_Habitacion);
        $habitacion->Estado = 'Ocupada';
        $habitacion->save();
    
        return redirect()->route('reservas.index')->with('success', 'Check-in realizado con éxito.');
    }

    public function checkOut($id) {
        $reserva = Reserva::findOrFail($id);

        if ($reserva->Estado != 'en curso') {
            return redirect()->route('reservas.index')->with('error', 'No se puede hacer check-out en esta reserva.');
        }

        $reserva->Estado = 'completada';
        $reserva->save();

        $habitacion = Habitacion::findOrFail($reserva->ID_Habitacion);
        $habitacion->Estado = 'Sucia';
        $habitacion->save();

        // Calculo el importe de la factura al clicar checkout y ya se genera desde este controller
        $tarifa = $reserva->tarifa;
        $numNoches = $reserva->Fecha_Llegada->diffInDays($reserva->Fecha_Salida);
        $importeAlojamiento = $tarifa->Precio * $numNoches;

        $servicios = ReservaServicio::where('ID_Reserva', $reserva->ID_Reservas)->with('servicio')->get();
        $importeServicios = $servicios->sum(function($servicio) {
            return $servicio->servicio->Precio;
        });

        $importeTotal = $importeAlojamiento + $importeServicios;

        // Creo la factura con los datos necesarios y valor predeterminado con tarjeta
        Factura::create([
            'ID_Reserva' => $reserva->ID_Reservas,
            'Cant_Pago' => $importeTotal,
            'Metodo_Pago' => 'Tarjeta',
            'Fecha_Pago' => Carbon::now(),
        ]);

        return redirect()->route('reservas.index')->with('success', 'Check-out realizado con éxito y factura generada.');
    }

    public function limpiar($id) {
        $habitacion = Habitacion::findOrFail($id);

        if ($habitacion->Estado != 'Sucia') {
            return redirect()->route('reservas.index')->with('error', 'Esta habitación no necesita limpieza.');
        }

        $reservaEnCurso = Reserva::where('ID_Habitacion', $id)->where('Estado', 'en curso')->first();

        if ($reservaEnCurso) {
            $habitacion->Estado = 'Ocupada';
        } else {
            $habitacion->Estado = 'Libre';
        }

        $habitacion->save();

        return redirect()->route('reservas.index')->with('success', 'Habitación limpiada con éxito.');
    }
}
