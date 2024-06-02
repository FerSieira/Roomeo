@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Empleado</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $empleado->Nombre }} {{ $empleado->Apellidos }}</h5>
            <p class="card-text"><strong>Departamento:</strong> {{ $empleado->Departamento }}</p>
            <p class="card-text"><strong>Usuario:</strong> {{ $empleado->Usuario }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $empleado->Email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $empleado->Telefono }}</p>
            <p class="card-text"><strong>Rol:</strong> {{ $empleado->Rol }}</p>
            <a href="{{ route('empleados.edit', $empleado->ID_Empleado) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('empleados.destroy', $empleado->ID_Empleado) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este empleado?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
