@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Acompañantes</h1>

    <style>
        .btn-custom {
            min-width: 100px;
            text-align: center;
        }
    </style>

    <a href="{{ route('acompanantes.create') }}" class="btn btn-primary btn-custom">Crear Nuevo Acompañante</a>

    <form method="GET" action="{{ route('acompanantes.index') }}" class="mt-3">
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
            @foreach($acompanantes as $acompanante)
            <tr>
                <td>{{ $acompanante->ID_Acompanante }}</td>
                <td>{{ $acompanante->Nombre }}</td>
                <td>{{ $acompanante->Apellidos }}</td>
                <td>{{ $acompanante->DNI }}</td>
                <td>
                    <a href="{{ route('acompanantes.show', $acompanante->ID_Acompanante) }}" class="btn btn-info btn-custom">Ver</a>
                    <a href="{{ route('acompanantes.edit', $acompanante->ID_Acompanante) }}" class="btn btn-primary btn-custom">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $acompanantes->appends(request()->query())->links() }}
    </div>
</div>
@endsection
