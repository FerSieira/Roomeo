@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form method="POST" action="{{ route('reservas.update', $reserva->ID_Reservas) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Fecha_Llegada" class="form-label">Fecha de Llegada</label>
            <input type="date" class="form-control" id="Fecha_Llegada" name="Fecha_Llegada" value="{{ optional($reserva->Fecha_Llegada)->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_Salida" class="form-label">Fecha de Salida</label>
            <input type="date" class="form-control" id="Fecha_Salida" name="Fecha_Salida" value="{{ optional($reserva->Fecha_Salida)->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="Adultos" class="form-label">Número de Adultos</label>
            <input type="number" class="form-control" id="Adultos" name="Adultos" value="{{ $reserva->Adultos }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="Ninos" class="form-label">Número de Niños</label>
            <input type="number" class="form-control" id="Ninos" name="Ninos" value="{{ $reserva->Ninos }}">
        </div>
        <div class="mb-3">
            <label for="Solicitudes" class="form-label">Solicitudes Especiales</label>
            <textarea class="form-control" id="Solicitudes" name="Solicitudes">{{ $reserva->Solicitudes }}</textarea>
        </div>
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado</label>
            <select class="form-control" id="Estado" name="Estado">
                <option value="pendiente" @if($reserva->Estado == 'pendiente') selected @endif>Pendiente</option>
                <option value="confirmada" @if($reserva->Estado == 'confirmada') selected @endif>Confirmada</option>
                <option value="cancelada" @if($reserva->Estado == 'cancelada') selected @endif>Cancelada</option>
                <option value="completada" @if($reserva->Estado == 'completada') selected @endif>Completada</option>
                <option value="en curso" @if($reserva->Estado == 'en curso') selected @endif>En Curso</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Cliente" class="form-label">Cliente</label>
            <select class="form-control" id="ID_Cliente" name="ID_Cliente">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->ID_Cliente }}" @if($cliente->ID_Cliente == $reserva->ID_Cliente) selected @endif>
                        {{ $cliente->Nombre }} {{ $cliente->Apellidos }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Tipo_Hab" class="form-label">Tipo de Habitación</label>
            <select class="form-control" id="ID_Tipo_Hab" name="ID_Tipo_Hab">
                @foreach($tipoHabitaciones as $tipo)
                    <option value="{{ $tipo->ID_Tipo_Hab }}" @if($tipo->ID_Tipo_Hab == $reserva->ID_Tipo_Hab) selected @endif>
                        {{ $tipo->Nombre_Tipo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Habitacion" class="form-label">Habitación</label>
            <select class="form-control" id="ID_Habitacion" name="ID_Habitacion">
                @foreach($habitaciones as $habitacion)
                    <option value="{{ $habitacion->ID_Habitacion }}" @if($habitacion->ID_Habitacion == $reserva->ID_Habitacion) selected @endif>
                        {{ $habitacion->Num_hab }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Tarifa" class="form-label">Tarifa</label>
            <select class="form-control" id="ID_Tarifa" name="ID_Tarifa">
                @foreach($tarifas as $tarifa)
                    <option value="{{ $tarifa->ID_Tarifa }}" @if($tarifa->ID_Tarifa == $reserva->ID_Tarifa) selected @endif>
                        {{ $tarifa->DescripcionTar }} - Desde: {{ $tarifa->Desde }} Hasta: {{ $tarifa->Hasta }} Precio: {{ $tarifa->Precio }}
                    </option>
                @endforeach
            </select>
        </div>

        <hr>
        <h4>Acompañantes</h4>
        <div id="acompanantes-wrapper">
            @foreach($acompanantes as $index => $acompanante)
            <div class="acompanante">
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][Nombre]" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][Nombre]" value="{{ $acompanante->Nombre }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][Apellidos]" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][Apellidos]" value="{{ $acompanante->Apellidos }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][Codigo_Postal]" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][Codigo_Postal]" value="{{ $acompanante->Codigo_Postal }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][DNI]" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][DNI]" value="{{ $acompanante->DNI }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][fecha_nac]" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="acompanantes[{{ $index }}][fecha_nac]" value="{{ optional($acompanante->fecha_nac)->format('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][nacionalidad]" class="form-label">Nacionalidad</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][nacionalidad]" value="{{ $acompanante->nacionalidad }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][direccion]" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][direccion]" value="{{ $acompanante->direccion }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][pais]" class="form-label">País</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][pais]" value="{{ $acompanante->pais }}">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[{{ $index }}][ciudad]" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="acompanantes[{{ $index }}][ciudad]" value="{{ $acompanante->ciudad }}">
                </div>
                <button type="button" class="btn btn-danger" onclick="borrarAcompanante(this)">Eliminar Acompañante</button>
            </div>
            <hr>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary" onclick="anadirAcompanante()">Añadir Acompañante</button>

        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
    </form>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    function anadirAcompanante() {
        const wrapper = document.getElementById('acompanantes-wrapper');
        const index = wrapper.children.length;
        const acompHtml = `
            <div class="acompanante">
                <div class="mb-3">
                    <label for="acompanantes[${index}][Nombre]" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][Nombre]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][Apellidos]" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][Apellidos]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][Codigo_Postal]" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][Codigo_Postal]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][DNI]" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][DNI]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][fecha_nac]" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="acompanantes[${index}][fecha_nac]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][nacionalidad]" class="form-label">Nacionalidad</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][nacionalidad]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][direccion]" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][direccion]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][pais]" class="form-label">País</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][pais]">
                </div>
                <div class="mb-3">
                    <label for="acompanantes[${index}][ciudad]" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][ciudad]">
                </div>
                <button type="button" class="btn btn-danger" onclick="removeAcompanante(this)">Eliminar Acompañante</button>
            </div>
            <hr>
        `;
        wrapper.insertAdjacentHTML('beforeend', acompHtml);
    }

    function borrarAcompanante(button) {
        button.parentElement.remove();
    }
</script>
@endsection
