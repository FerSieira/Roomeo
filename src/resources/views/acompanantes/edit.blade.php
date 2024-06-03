@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Acompañante</h1>
    <form method="POST" action="{{ route('acompanantes.update', $acompanante->ID_Acompanante) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $acompanante->Nombre) }}" required>
            @error('Nombre')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="{{ old('Apellidos', $acompanante->Apellidos) }}" required>
            @error('Apellidos')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Codigo_Postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" value="{{ old('Codigo_Postal', $acompanante->Codigo_Postal) }}" required>
            @error('Codigo_Postal')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="DNI" name="DNI" value="{{ old('DNI', $acompanante->DNI) }}" required>
            @error('DNI')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac', $acompanante->fecha_nac) }}" required>
            @error('fecha_nac')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad', $acompanante->nacionalidad) }}" required>
            @error('nacionalidad')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $acompanante->direccion) }}" required>
            @error('direccion')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais', $acompanante->pais) }}" required>
            @error('pais')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ old('ciudad', $acompanante->ciudad) }}" required>
            @error('ciudad')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Acompañante</button>
    </form>
</div>
@endsection


