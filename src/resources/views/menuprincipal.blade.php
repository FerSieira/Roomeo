@extends('layouts.app')
<!-- Incluye Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <h3>Reservas de Hoy</h3>
            <p>Entradas: {{ $reservasInicioHoy }}</p>
            <p>Salidas: {{ $reservasFinHoy }}</p>
        </div>
        <div class="col-md-6">
            <h3>Estado de Habitaciones</h3>
            <p>Total Habitaciones: {{ $totalHabitaciones }}</p>
            <p>Disponibles: {{ $habitacionesDisponibles }}</p>
            <p>Ocupadas: {{ $habitacionesOcupadas }}</p>
            <p>Sucias: {{ $habitacionesSucias }}</p>
        </div>
    </div>
</div>
@endsection
