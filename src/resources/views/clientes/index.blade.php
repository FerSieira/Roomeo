@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Nuevo Cliente</a>
    <a href="{{ route('acompanantes.index') }}" class="btn btn-secondary">Ver Acompañantes</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->ID_Cliente }}</td>
                <td>{{ $cliente->Nombre }}</td>
                <td>{{ $cliente->Apellidos }}</td>
                <td>{{ $cliente->DNI }}</td>
                <td>
                    <a href="{{ route('clientes.show', $cliente->ID_Cliente) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->ID_Cliente) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->ID_Cliente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
