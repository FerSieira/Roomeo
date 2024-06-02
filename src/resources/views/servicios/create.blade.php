@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Servicio</h1>
    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="Activo" class="form-label">Activo</label>
            <select class="form-control" id="Activo" name="Activo" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="Precio" name="Precio" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
