@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tipo de Habitación</h1>
    <form method="POST" action="{{ route('tipohabitaciones.update', ['tipohabitacione' => $tipohabitacione->ID_Tipo_Hab]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nombre_Tipo" class="form-label">Nombre del Tipo de Habitación</label>
            <input type="text" class="form-control" id="Nombre_Tipo" name="Nombre_Tipo" value="{{ $tipohabitacione->Nombre_Tipo }}" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion">{{ $tipohabitacione->Descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="Capacidad" class="form-label">Capacidad</label>
            <input type="number" class="form-control" id="Capacidad" name="Capacidad" value="{{ $tipohabitacione->Capacidad }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tipo de Habitación</button>
    </form>
</div>
@endsection