@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Crear Empleado</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Departamento</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->ID_Empleado }}</td>
                    <td>{{ $empleado->Nombre }}</td>
                    <td>{{ $empleado->Apellidos }}</td>
                    <td>{{ $empleado->Departamento }}</td>
                    <td>{{ $empleado->Usuario }}</td>
                    <td>{{ $empleado->Email }}</td>
                    <td>{{ $empleado->Rol }}</td>
                    <td>
                        <a href="{{ route('empleados.show', $empleado->ID_Empleado) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('empleados.edit', $empleado->ID_Empleado) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->ID_Empleado) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
