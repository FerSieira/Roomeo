@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Acompañantes</h1>
    <a href="{{ route('acompanantes.create') }}" class="btn btn-primary">Crear Nuevo Acompañante</a>
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
                    <a href="{{ route('acompanantes.show', $acompanante->ID_Acompanante) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('acompanantes.edit', $acompanante->ID_Acompanante) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('acompanantes.destroy', $acompanante->ID_Acompanante) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer eliminar este acompañante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
