@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tipos de Habitación</h1>
    <a href="{{ route('tipohabitaciones.create') }}" class="btn btn-primary">Crear Nuevo Tipo de Habitación</a>

    @if($tiposHabitacion->count() > 0)
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposHabitacion as $tipo)
                <tr>
                    <td>{{ $tipo->ID_Tipo_Hab }}</td>
                    <td>{{ $tipo->Nombre_Tipo }}</td>
                    <td>{{ $tipo->Descripcion }}</td>
                    <td>{{ $tipo->Capacidad }}</td>
                    <td>
                        <a href="{{ route('tipohabitaciones.show', ['tipohabitacion' => $tipo->ID_Tipo_Hab]) }}" class="btn btn-info">Mostrar</a>
                        <a href="{{ route('tipohabitaciones.edit', ['tipohabitacion' => $tipo->ID_Tipo_Hab]) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('tipohabitaciones.destroy', ['tipohabitacion' => $tipo->ID_Tipo_Hab]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este tipo de habitación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay tipos de habitación disponibles. Por favor, crea uno.</p>
    @endif
</div>
@endsection
