@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Tarifa</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tarifa->DescripcionTar }}</h5>
            <p class="card-text"><strong>Desde:</strong> {{ \Carbon\Carbon::parse($tarifa->Desde)->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Hasta:</strong> {{ \Carbon\Carbon::parse($tarifa->Hasta)->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Precio:</strong> {{ $tarifa->Precio }}</p>
            <p class="card-text"><strong>Ocupación:</strong> {{ $tarifa->Ocupacion }}</p>
            <a href="{{ route('tarifas.edit', $tarifa->ID_Tarifa) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('tarifas.destroy', $tarifa->ID_Tarifa) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta tarifa?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
