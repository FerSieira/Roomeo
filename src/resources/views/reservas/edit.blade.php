@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form method="POST" action="{{ route('reservas.update', $reserva->ID_Reservas) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Fecha_Llegada" class="form-label">Fecha de Llegada</label>
            <input type="date" class="form-control" id="Fecha_Llegada" name="Fecha_Llegada" value="{{ $reserva->Fecha_Llegada }}" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_Salida" class="form-label">Fecha de Salida</label>
            <input type="date" class="form-control" id="Fecha_Salida" name="Fecha_Salida" value="{{ $reserva->Fecha_Salida }}" required>
        </div>
        <div class="mb-3">
            <label for="Adultos" class="form-label">Número de Adultos</label>
            <input type="number" class="form-control" id="Adultos" name="Adultos" value="{{ $reserva->Adultos }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="Ninos" class="form-label">Número de Niños</label>
            <input type="number" class="form-control" id="Ninos" name="Ninos" value="{{ $reserva->Ninos }}">
        </div>
        <div class="mb-3">
            <label for="Solicitudes" class="form-label">Solicitudes Especiales</label>
            <textarea class="form-control" id="Solicitudes" name="Solicitudes">{{ $reserva->Solicitudes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
    </form>
</div>
@endsection
