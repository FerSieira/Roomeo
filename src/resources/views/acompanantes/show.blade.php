@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Acompañante</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $acompanante->Nombre }} {{ $acompanante->Apellidos }}</h5>
            <p class="card-text"><strong>DNI:</strong> {{ $acompanante->DNI }}</p>
            <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $acompanante->fecha_nac }}</p>
            <p class="card-text"><strong>Nacionalidad:</strong> {{ $acompanante->nacionalidad }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $acompanante->direccion }}</p>
            <p class="card-text"><strong>Ciudad:</strong> {{ $acompanante->ciudad }}</p>
            <p class="card-text"><strong>País:</strong> {{ $acompanante->pais }}</p>
            <a href="{{ route('acompanantes.edit', $acompanante->ID_Acompanante) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('acompanantes.destroy', $acompanante->ID_Acompanante) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este acompañante?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
