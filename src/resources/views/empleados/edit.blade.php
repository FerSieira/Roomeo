@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>
    <form action="{{ route('empleados.update', $empleado->ID_Empleado) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $empleado->Nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="{{ $empleado->Apellidos }}" required>
        </div>
        <div class="mb-3">
            <label for="Departamento" class="form-label">Departamento</label>
            <select class="form-control" id="Departamento" name="Departamento" required>
                <option value="Recepcion" {{ $empleado->Departamento == 'Recepcion' ? 'selected' : '' }}>Recepción</option>
                <option value="Pisos" {{ $empleado->Departamento == 'Pisos' ? 'selected' : '' }}>Pisos</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="Usuario" name="Usuario" value="{{ $empleado->Usuario }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (dejar en blanco para mantener la actual)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ $empleado->Telefono }}" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ $empleado->Email }}" required>
        </div>
        <div class="mb-3">
            <label for="Rol" class="form-label">Rol</label>
            <select class="form-control" id="Rol" name="Rol" required>
                <option value="usuario" {{ $empleado->Rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                <option value="administrador" {{ $empleado->Rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
