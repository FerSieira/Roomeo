@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tarifas</h1>
    <a href="{{ route('tarifas.create') }}" class="btn btn-primary">Crear Nueva Tarifa</a>
    <div class="list-group mt-3">
        @foreach ($tarifas as $tarifa)
            <a href="{{ route('tarifas.show', $tarifa->ID_Tarifa) }}" class="list-group-item list-group-item-action">
                {{ $tarifa->DescripcionTar }} - {{ $tarifa->Precio }} €
            </a>
        @endforeach
    </div>
</div>
@endsection
