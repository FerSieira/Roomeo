@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Reserva</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h4>Información del Cliente</h4>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $reserva->cliente->Nombre }} {{ $reserva->cliente->Apellidos }}</p>
            <p><strong>Tipo de Habitación:</strong> {{ $reserva->tipoHabitacion->Nombre_Tipo }}</p>
            <p><strong>Habitación Asignada:</strong> {{ $reserva->habitacion->Num_hab }}</p>
            <p><strong>Tarifa Aplicada:</strong> {{ $reserva->tarifa->DescripcionTar }} - ${{ $reserva->tarifa->Precio }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h4>Detalles de la Reserva</h4>
        </div>
        <div class="card-body">
            <p><strong>Fecha de Llegada:</strong> {{ $reserva->Fecha_Llegada ? $reserva->Fecha_Llegada->format('d-m-Y') : 'Fecha no disponible' }}</p>
            <p><strong>Fecha de Salida:</strong> {{ $reserva->Fecha_Salida ? $reserva->Fecha_Salida->format('d-m-Y') : 'Fecha no disponible' }}</p>
            <p><strong>Estado:</strong> {{ $reserva->Estado }}</p>
            <p><strong>Adultos:</strong> {{ $reserva->Adultos }}</p>
            <p><strong>Niños:</strong> {{ $reserva->Ninos ?? 'N/A' }}</p>
            <p><strong>Hora de Entrada:</strong> {{ $reserva->hora_entra ?? 'No especificado' }}</p>
            <p><strong>Hora de Salida:</strong> {{ $reserva->hora_sale ?? 'No especificado' }}</p>
            <p><strong>Solicitudes Especiales:</strong> {{ $reserva->Solicitudes ?? 'Ninguna' }}</p>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ route('reservas.edit', ['reserva' => $reserva->ID_Reservas]) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('reservas.destroy', ['reserva' => $reserva->ID_Reservas]) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
        </form>
    </div>
</div>
@endsection

