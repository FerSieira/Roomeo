@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Servicios</h1>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Crear Servicio</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->ID_Servicio }}</td>
                    <td>{{ $servicio->Nombre }}</td>
                    <td>{{ $servicio->Descripcion }}</td>
                    <td>{{ $servicio->Activo ? 'Sí' : 'No' }}</td>
                    <td>{{ $servicio->Precio }}</td>
                    <td>
                        <a href="{{ route('servicios.show', $servicio->ID_Servicio) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('servicios.edit', $servicio->ID_Servicio) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('servicios.destroy', $servicio->ID_Servicio) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este servicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
