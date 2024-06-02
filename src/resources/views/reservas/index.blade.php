@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Llegada</th>
                <th>Fecha Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->ID_Reservas }}</td>
                <td>{{ $reserva->Fecha_Llegada ? $reserva->Fecha_Llegada->format('d-m-Y') : 'Fecha no disponible' }}</td>
                <td>{{ $reserva->Fecha_Salida ? $reserva->Fecha_Salida->format('d-m-Y') : 'Fecha no disponible' }}</td>
                <td>
                    <a href="{{ route('reservas.show', ['reserva' => $reserva->ID_Reservas]) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('reservas.edit', ['reserva' => $reserva->ID_Reservas]) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('reservas.destroy', ['reserva' => $reserva->ID_Reservas]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

