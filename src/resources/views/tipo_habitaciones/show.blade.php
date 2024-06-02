@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Tipo de Habitación</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tipohabitacion->Nombre_Tipo }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $tipohabitacion->Descripcion }}</p>
            <p class="card-text"><strong>Capacidad:</strong> {{ $tipohabitacion->Capacidad }}</p>
            <a href="{{ route('tipohabitaciones.edit', ['tipohabitacion' => $tipohabitacion->ID_Tipo_Hab]) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('tipohabitaciones.destroy', ['tipohabitacion' => $tipohabitacion->ID_Tipo_Hab]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este tipo de habitación?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
