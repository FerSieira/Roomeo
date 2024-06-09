@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empleados</h1>

<!-- Aquí puse mas estilos que en los otros porque no se porque si utilizaba solo la clase btn custom me salian todos pegados asi que le aplique a todos -->
    <style>
        .btn-custom {
            min-width: 100px;
            text-align: center;
            margin: 5px 0;
        }
        .action-buttons form {
            display: inline;
        }
        .action-buttons .btn-custom {
            margin-right: 5px;
        }
    </style>

    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3 btn-custom">Crear Empleado</a>
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
                        <div class="action-buttons">
                            <a href="{{ route('empleados.show', $empleado->ID_Empleado) }}" class="btn btn-info btn-sm btn-custom">Ver</a>
                            <a href="{{ route('empleados.edit', $empleado->ID_Empleado) }}" class="btn btn-warning btn-sm btn-custom">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->ID_Empleado) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('¿Estás seguro de querer eliminar este empleado?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $empleados->appends(request()->query())->links() }}
    </div>
</div>
@endsection
