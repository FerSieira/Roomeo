@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Reserva de Servicio</h1>
    <form method="POST" action="{{ route('reserva_servicios.store') }}">
        @csrf
        <div class="mb-3">
            <label for="ID_Reserva" class="form-label">Reserva</label>
            <select class="form-control" id="ID_Reserva" name="ID_Reserva" required>
                @foreach ($reservas as $reserva)
                    <option value="{{ $reserva->ID_Reservas }}">{{ $reserva->ID_Reservas }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Servicio" class="form-label">Servicio</label>
            <select class="form-control" id="ID_Servicio" name="ID_Servicio" required>
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->ID_Servicio }}">{{ $servicio->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Empleado" class="form-label">Empleado</label>
            <select class="form-control" id="ID_Empleado" name="ID_Empleado" required>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->ID_Empleado }}">{{ $empleado->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="Dia_Hora" class="form-label">Día y Hora</label>
            <input type="datetime-local" class="form-control" id="Dia_Hora" name="Dia_Hora" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Reserva de Servicio</button>
    </form>
</div>
@endsection