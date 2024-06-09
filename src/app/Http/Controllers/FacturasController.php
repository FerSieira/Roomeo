<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FacturasController extends Controller {
    public function index(Request $request) {
        $query = Factura::with('reserva.cliente', 'reserva.habitacion', 'reserva.tarifa');

        if ($request->filled('factura_id')) {
            $query->where('ID_Factura', $request->factura_id);
        }

        if ($request->filled('nombre_cliente')) {
            $query->whereHas('reserva.cliente', function($q) use ($request) {
                $q->where('Nombre', 'like', '%' . $request->nombre_cliente . '%')
                  ->orWhere('Apellidos', 'like', '%' . $request->nombre_cliente . '%');
            });
        }

        if ($request->filled('fecha_pago')) {
            $query->whereDate('Fecha_Pago', $request->fecha_pago);
        }

        $facturas = $query->orderBy('Fecha_Pago', 'desc')->paginate(10);

        return view('facturas.index', compact('facturas'));
    }

    public function show($id) {
        $factura = Factura::with(['reserva.cliente', 'reserva.habitacion', 'reserva.tarifa', 'reserva.reservaServicios.servicio'])->findOrFail($id);
        $numNoches = $factura->reserva->Fecha_Llegada->diffInDays($factura->reserva->Fecha_Salida);
        $importeServicios = $factura->reserva->reservaServicios->sum('servicio.Precio');
        $importeTotal = $factura->Cant_Pago;

        return view('facturas.show', compact('factura', 'numNoches', 'importeServicios', 'importeTotal'));
    }
}

