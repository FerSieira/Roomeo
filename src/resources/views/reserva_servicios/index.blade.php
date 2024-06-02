@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas de Servicios</h1>
    <a href="{{ route('reserva_servicios.create') }}" class="btn btn-primary">Crear Nueva Reserva de Servicio</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reserva</th>
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
                <td>{{ $reservaServicio->servicio->Nombre }}</td>
                <td>{{ $reservaServicio->empleado->Nombre }}</td>
                <td>{{ $reservaServicio->Dia_Hora }}</td>
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
