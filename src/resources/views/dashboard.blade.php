@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a Roomeo</h1>
    <h2>Reservas que inician hoy</h2>
    @if(isset($reservasInicioHoy) && $reservasInicioHoy->count() > 0)
        <ul>
            @foreach($reservasInicioHoy as $reserva)
                <li>{{ $reserva->nombre_cliente }} - {{ $reserva->fecha_inicio }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay reservas que inicien hoy.</p>
    @endif
</div>
@endsection
