@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas</h1>

    <style>
        .btn-custom {
            min-width: 100px;
            text-align: center;
        }
    </style>
    
    <form method="GET" action="{{ route('reservas.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="date" name="fecha_inicio" class="form-control" placeholder="Fecha de Inicio" value="{{ request('fecha_inicio') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre del Cliente" value="{{ request('nombre_cliente') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-custom">Buscar</button>
            </div>
            <div class="col-md-3">
                <a href="{{ route('reservas.index', array_merge(request()->query(), ['ver_todas' => true])) }}" class="btn btn-secondary btn-custom">Ver Todas</a>
            </div>
        </div>
    </form>

    <a href="{{ route('reservas.create') }}" class="btn btn-primary btn-custom">Crear Reserva</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Llegada</th>
                <th>Fecha Salida</th>
                <th>Cliente</th>
                <th>Habitación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->ID_Reservas }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($reserva->Fecha_Llegada)->format('d-m-Y') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($reserva->Fecha_Salida)->format('d-m-Y') }}
                </td>
                <td>{{ $reserva->cliente->Nombre }} {{ $reserva->cliente->Apellidos }}</td>
                <td>{{ $reserva->habitacion ? $reserva->habitacion->Num_hab : 'No asignada' }}</td>
                <td>
                    <a href="{{ route('reservas.show', ['reserva' => $reserva->ID_Reservas]) }}" class="btn btn-info btn-sm btn-custom">Ver</a>
                    <a href="{{ route('reservas.edit', ['reserva' => $reserva->ID_Reservas]) }}" class="btn btn-primary btn-sm btn-custom">Editar</a>
                    <form action="{{ route('reservas.destroy', ['reserva' => $reserva->ID_Reservas]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                    </form>
                    @if ($reserva->Estado != 'completada' && $reserva->Estado != 'en curso')
                        <form action="{{ route('reservas.checkin', ['reserva' => $reserva->ID_Reservas]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm btn-custom">Check-in</button>
                        </form>
                    @endif
                    @if ($reserva->Estado == 'en curso')
                        <form action="{{ route('reservas.checkout', ['reserva' => $reserva->ID_Reservas]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm btn-custom">Check-out</button>
                        </form>
                    @endif
                    @if ($reserva->habitacion && $reserva->habitacion->Estado == 'Sucia')
                        <form action="{{ route('reservas.limpiar', ['habitacion' => $reserva->habitacion->ID_Habitacion]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-secondary btn-sm btn-custom">Limpiar</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $reservas->appends(request()->query())->links() }}
    </div>
</div>
@endsection
