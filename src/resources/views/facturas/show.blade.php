@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Factura #{{ $factura->ID_Factura }}</h1>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Información del Cliente</h5>
            <p><strong>Nombre:</strong> {{ $factura->reserva->cliente->Nombre }} {{ $factura->reserva->cliente->Apellidos }}</p>
            <p><strong>DNI:</strong> {{ $factura->reserva->cliente->DNI }}</p>

            <h5 class="card-title mt-4">Información de la Reserva</h5>
            <p><strong>Fecha de Llegada:</strong> {{ \Carbon\Carbon::parse($factura->reserva->Fecha_Llegada)->format('d-m-Y') }}</p>
            <p><strong>Fecha de Salida:</strong> {{ \Carbon\Carbon::parse($factura->reserva->Fecha_Salida)->format('d-m-Y') }}</p>
            <p><strong>Habitación:</strong> {{ $factura->reserva->habitacion->Num_hab }}</p>
            <p><strong>Tarifa Aplicada:</strong> {{ $factura->reserva->tarifa->Precio }} €/noche</p>
            <p><strong>Número de Noches:</strong> {{ $numNoches }}</p>

            <h5 class="card-title mt-4">Servicios Consumidos</h5>
            <ul>
                @foreach ($factura->reserva->reservaServicios as $reservaServicio)
                <li>{{ $reservaServicio->servicio->Nombre }} - {{ $reservaServicio->servicio->Precio }} € (Fecha: {{ \Carbon\Carbon::parse($reservaServicio->Dia_Hora)->format('d-m-Y H:i') }})</li>
                @endforeach
            </ul>

            <h5 class="card-title mt-4">Importe Total</h5>
            <p><strong>Precio Total de Alojamiento:</strong> {{ $factura->reserva->tarifa->Precio * $numNoches }} €</p>
            <p><strong>Precio Total de Servicios:</strong> {{ $importeServicios }} €</p>
            <p><strong>Importe Total Facturado:</strong> {{ $importeTotal }} €</p> 
        </div>
    </div>
</div>
@endsection
