@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Reserva de Servicio</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reserva: {{ $reservaServicio->reserva->ID_Reservas }}</h5>
            <p class="card-text"><strong>Servicio:</strong> {{ $reservaServicio->servicio->Nombre }}</p>
            <p class="card-text"><strong>Empleado:</strong> {{ $reservaServicio->empleado->Nombre }}</p>
            <p class="card-text"><strong>Día y Hora:</strong> {{ $reservaServicio->Dia_Hora }}</p>
            <a href="{{ route('reserva_servicios.edit', $reservaServicio->ID_RS) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('reserva_servicios.destroy', $reservaServicio->ID_RS) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta reserva de servicio?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
