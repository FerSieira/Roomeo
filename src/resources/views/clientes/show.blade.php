@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Cliente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->Nombre }} {{ $cliente->Apellidos }}</h5>
            <p class="card-text"><strong>DNI:</strong> {{ $cliente->DNI }}</p>
            <p class="card-text"><strong>Nacionalidad:</strong> {{ $cliente->Nacionalidad }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $cliente->Telefono }}</p>
            <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($cliente->Fecha_nacimiento)->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $cliente->Email }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $cliente->Direccion }}</p>
            <p class="card-text"><strong>Código Postal:</strong> {{ $cliente->Codigo_Postal }}</p>
            <p class="card-text"><strong>Ciudad:</strong> {{ $cliente->Ciudad }}</p>
            <p class="card-text"><strong>País:</strong> {{ $cliente->Pais }}</p>
            <p class="card-text"><strong>Tarjeta de Crédito:</strong> {{ $cliente->Tarjeta_Cred }}</p>
            <a href="{{ route('clientes.edit', $cliente->ID_Cliente) }}" class="btn btn-primary">Editar</a>
            
        </div>
    </div>
</div>
@endsection

