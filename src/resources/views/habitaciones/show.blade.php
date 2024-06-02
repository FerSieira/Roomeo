@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Habitación</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Número de Habitación: {{ $habitacion->Num_hab }}</h5>
            <p class="card-text"><strong>Planta:</strong> {{ $habitacion->Planta }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $habitacion->Estado }}</p>
            <p class="card-text"><strong>Tipo de Habitación:</strong> {{ $habitacion->tipoHabitacion->Nombre_Tipo }}</p>
        </div>
    </div>
</div>
@endsection
