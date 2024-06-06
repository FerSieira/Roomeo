@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas de Servicios</h1>
    <div class="mb-3">
        <a href="{{ route('reserva_servicios.create') }}" class="btn btn-primary">Crear Nueva Reserva de Servicio</a>
        @if(request()->has('show_all'))
            <a href="{{ route('reserva_servicios.index') }}" class="btn btn-secondary">Mostrar Reservas Actuales</a>
        @else
            <a href="{{ route('reserva_servicios.index', ['show_all' => 'true']) }}" class="btn btn-secondary">Mostrar Todas las Reservas</a>
        @endif
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reserva</th>
                <th>Habitación</th>
                <th>Servicio</th>
                <th>Empleado</th>
                <th>Día y Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservaServicios as $reservaServicio)
            <tr>
                <td>{{ $reservaServicio->ID_RS }}</td>
                <td>{{ $reservaServicio->reserva->ID_Reservas }}</td>
                <td>{{ $reservaServicio->reserva->habitacion->Num_hab }}</td>
                <td>{{ $reservaServicio->servicio->Nombre }}</td>
                <td>{{ $reservaServicio->empleado->Nombre }}</td>
                <td>{{ \Carbon\Carbon::parse($reservaServicio->Dia_Hora)->format('d-m-y H:i') }}</td>
                <td>
                    <a href="{{ route('reserva_servicios.show', $reservaServicio->ID_RS) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('reserva_servicios.edit', $reservaServicio->ID_RS) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('reserva_servicios.destroy', $reservaServicio->ID_RS) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta reserva de servicio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection