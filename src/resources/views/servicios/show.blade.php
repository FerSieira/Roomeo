@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Servicio</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $servicio->Nombre }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $servicio->Descripcion }}</p>
            <p class="card-text"><strong>Activo:</strong> {{ $servicio->Activo ? 'Sí' : 'No' }}</p>
            <p class="card-text"><strong>Precio:</strong> {{ $servicio->Precio }}</p>
            <a href="{{ route('servicios.edit', $servicio->ID_Servicio) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('servicios.destroy', $servicio->ID_Servicio) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este servicio?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
