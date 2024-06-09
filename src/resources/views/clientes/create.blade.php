@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Cliente</h1>
    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="{{ old('Apellidos') }}" required>
        </div>
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="DNI" name="DNI" value="{{ old('DNI') }}" required>
        </div>
        <div class="mb-3">
            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" value="{{ old('Nacionalidad') }}" required>
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ old('Telefono') }}" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="Fecha_nacimiento" name="Fecha_nacimiento" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ old('Email') }}" required>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" value="{{ old('Direccion') }}" required>
        </div>
        <div class="mb-3">
            <label for="Codigo_Postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" value="{{ old('Codigo_Postal') }}" required>
        </div>
        <div class="mb-3">
            <label for="Ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" value="{{ old('Ciudad') }}" required>
        </div>
        <div class="mb-3">
            <label for="Pais" class="form-label">País</label>
            <input type="text" class="form-control" id="Pais" name="Pais" value="{{ old('Pais') }}" required>
        </div>
        <div class="mb-3">
            <label for="Tarjeta_Cred" class="form-label">Tarjeta de Crédito (opcional)</label>
            <input type="text" class="form-control" id="Tarjeta_Cred" name="Tarjeta_Cred">
        </div>
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </form>
</div>
@endsection
