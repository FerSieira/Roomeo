@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Facturas</h1>

    <form method="GET" action="{{ route('facturas.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="factura_id" class="form-control" placeholder="ID de Factura" value="{{ request('factura_id') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre del Cliente" value="{{ request('nombre_cliente') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="fecha_pago" class="form-control" placeholder="Fecha de Pago" value="{{ request('fecha_pago') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Pago</th>
                <th>Importe Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
            <tr>
                <td>{{ $factura->ID_Factura }}</td>
                <td>{{ $factura->reserva->cliente->Nombre }} {{ $factura->reserva->cliente->Apellidos }}</td>
                <td>{{ \Carbon\Carbon::parse($factura->Fecha_Pago)->format('d-m-Y') }}</td>
                <td>{{ $factura->Cant_Pago }} €</td>
                <td>
                    <a href="{{ route('facturas.show', ['factura' => $factura->ID_Factura]) }}" class="btn btn-info btn-sm">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $facturas->appends(request()->query())->links() }}
    </div>

</div>
@endsection