@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Habitaciones</h1>

    <style>
        .btn-custom {
            min-width: 100px;
            text-align: center;
        }
    </style>

    <a href="{{ route('habitaciones.create') }}" class="btn btn-primary btn-custom">Crear Nueva Habitación</a>
    <a href="{{ route('tipohabitaciones.create') }}" class="btn btn-secondary btn-custom">Crear Nuevo Tipo de Habitación</a>
    <a href="{{ route('tipohabitaciones.index') }}" class="btn btn-info btn-custom">Ver Tipos de Habitación</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Habitación</th>
                <th>Planta</th>
                <th>Estado</th>
                <th>Tipo de Habitación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitaciones as $habitacion)
            <tr>
                <td>{{ $habitacion->ID_Habitacion }}</td>
                <td>{{ $habitacion->Num_hab }}</td>
                <td>{{ $habitacion->Planta }}</td>
                <td>{{ $habitacion->Estado }}</td>
                <td>{{ $habitacion->tipoHabitacion->Nombre_Tipo }}</td>
                <td>
                    <a href="{{ route('habitaciones.edit', ['habitacion' => $habitacion->ID_Habitacion]) }}" class="btn btn-info btn-sm btn-custom">Editar</a>
                    <form action="{{ route('habitaciones.destroy', ['habitacion' => $habitacion->ID_Habitacion]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('Está seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $habitaciones->appends(request()->query())->links() }}
    </div>
</div>
@endsection