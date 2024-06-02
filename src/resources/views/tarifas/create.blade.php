@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($tarifa) ? 'Editar Tarifa' : 'Crear Tarifa' }}</h1>
    <form action="{{ isset($tarifa) ? route('tarifas.update', $tarifa->ID_Tarifa) : route('tarifas.store') }}" method="POST">
        @csrf
        @if(isset($tarifa))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="DescripcionTar" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="DescripcionTar" name="DescripcionTar" required value="{{ $tarifa->DescripcionTar ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="Desde" class="form-label">Desde</label>
            <input type="date" class="form-control" id="Desde" name="Desde" required value="{{ $tarifa->Desde ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="Hasta" class="form-label">Hasta</label>
            <input type="date" class="form-control" id="Hasta" name="Hasta" required value="{{ $tarifa->Hasta ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label">Precio (€)</label>
            <input type="number" class="form-control" step="0.01" id="Precio" name="Precio" required value="{{ $tarifa->Precio ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="Ocupacion" class="form-label">Ocupación (%)</label>
            <input type="number" class="form-control" id="Ocupacion" name="Ocupacion" required value="{{ $tarifa->Ocupacion ?? '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection