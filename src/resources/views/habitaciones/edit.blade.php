@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Habitación</h1>
    <form method="POST" action="{{ route('habitaciones.update', ['habitacion' => $habitacion->ID_Habitacion]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Num_hab" class="form-label">Número de Habitación</label>
            <input type="text" class="form-control" id="Num_hab" name="Num_hab" value="{{ $habitacion->Num_hab }}" required>
        </div>
        <div class="mb-3">
            <label for="Planta" class="form-label">Planta</label>
            <input type="number" class="form-control" id="Planta" name="Planta" value="{{ $habitacion->Planta }}" required>
        </div>
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado</label>
            <select class="form-control" id="Estado" name="Estado" required>
                <option value="Limpia" {{ $habitacion->Estado == 'Limpia' ? 'selected' : '' }}>Limpia</option>
                <option value="Sucia" {{ $habitacion->Estado == 'Sucia' ? 'selected' : '' }}>Sucia</option>
                <option value="Ocupada" {{ $habitacion->Estado == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                <option value="Libre" {{ $habitacion->Estado == 'Libre' ? 'selected' : '' }}>Libre</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Tipo_Hab" class="form-label">Tipo de Habitación</label>
            <select class="form-control" id="ID_Tipo_Hab" name="ID_Tipo_Hab">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->ID_Tipo_Hab }}" {{ $habitacion->ID_Tipo_Hab == $tipo->ID_Tipo_Hab ? 'selected' : '' }}>
                        {{ $tipo->Nombre_Tipo }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Habitación</button>
    </form>
</div>
@endsection
