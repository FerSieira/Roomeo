@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clientes</h1>

    <style>
        .btn-custom {
            min-width: 100px;
            text-align: center;
        }
    </style>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-custom">Crear Nuevo Cliente</a>
    <a href="{{ route('acompanantes.index') }}" class="btn btn-secondary btn-custom">Ver Acompañantes</a>

    <form method="GET" action="{{ route('clientes.index') }}" class="mt-3">
        <div class="row mb-3">
            <div class="col">
                <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ request('nombre') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="apellidos" placeholder="Buscar por apellidos" value="{{ request('apellidos') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="dni" placeholder="Buscar por DNI" value="{{ request('dni') }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary btn-custom">Buscar</button>
            </div>
        </div>
    </form>

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
                    <a href="{{ route('clientes.show', $cliente->ID_Cliente) }}" class="btn btn-info btn-custom">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->ID_Cliente) }}" class="btn btn-primary btn-custom">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $clientes->appends(request()->query())->links() }}
    </div>
</div>
@endsection
