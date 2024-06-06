@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>
    <form action="{{ route('reservas.store') }}" method="POST" id="reservaForm">
        @csrf

        <fieldset class="border p-4 mb-4">
            <legend class="w-auto px-2">Información del Cliente</legend>

            <div class="mb-3">
                <label for="cliente_tipo">Tipo de Cliente</label>
                <select class="form-control" id="cliente_tipo" name="cliente_tipo" onchange="activarClienteNue()">
                    <option value="existente">Cliente Existente</option>
                    <option value="nuevo">Nuevo Cliente</option>
                </select>
            </div>

            <div id="cliente_existente">
                <div class="mb-3">
                    <label for="ID_Cliente">Cliente</label>
                    <select class="form-control" id="ID_Cliente" name="ID_Cliente">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->ID_Cliente }}">{{ $cliente->Nombre }} {{ $cliente->Apellidos }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="cliente_nuevo" style="display: none;">
                <div class="mb-3">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="nuevo_cliente[Nombre]">
                </div>
                <div class="mb-3">
                    <label for="Apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="Apellidos" name="nuevo_cliente[Apellidos]">
                </div>
                <div class="mb-3">
                    <label for="DNI">DNI</label>
                    <input type="text" class="form-control" id="DNI" name="nuevo_cliente[DNI]">
                </div>
                <div class="mb-3">
                    <label for="Nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control" id="Nacionalidad" name="nuevo_cliente[Nacionalidad]">
                </div>
                <div class="mb-3">
                    <label for="Telefono">Teléfono</label>
                    <input type="text" class="form-control" id="Telefono" name="nuevo_cliente[Telefono]">
                </div>
                <div class="mb-3">
                    <label for="Fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="Fecha_nacimiento" name="nuevo_cliente[Fecha_nacimiento]">
                </div>
                <div class="mb-3">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email" name="nuevo_cliente[Email]">
                </div>
                <div class="mb-3">
                    <label for="Direccion">Dirección</label>
                    <input type="text" class="form-control" id="Direccion" name="nuevo_cliente[Direccion]">
                </div>
                <div class="mb-3">
                    <label for="Codigo_Postal">Código Postal</label>
                    <input type="text" class="form-control" id="Codigo_Postal" name="nuevo_cliente[Codigo_Postal]">
                </div>
                <div class="mb-3">
                    <label for="Ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="Ciudad" name="nuevo_cliente[Ciudad]">
                </div>
                <div class="mb-3">
                    <label for="Pais">País</label>
                    <input type="text" class="form-control" id="Pais" name="nuevo_cliente[Pais]">
                </div>
                <div class="mb-3">
                    <label for="Tarjeta_Cred">Tarjeta de Crédito</label>
                    <input type="text" class="form-control" id="Tarjeta_Cred" name="nuevo_cliente[Tarjeta_Cred]">
                </div>
            </div>
        </fieldset>

        <fieldset class="border p-4 mb-4">
            <legend class="w-auto px-2">Información de la Reserva</legend>

            <div class="mb-3">
                <label for="ID_Tipo_Hab">Tipo de Habitación</label>
                <select class="form-control" id="ID_Tipo_Hab" name="ID_Tipo_Hab" onchange="cargaHabs()">
                    <option value="">Seleccione un tipo de habitación</option>
                    @foreach($tipoHabitaciones as $tipo)
                        <option value="{{ $tipo->ID_Tipo_Hab }}">{{ $tipo->Nombre_Tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ID_Habitacion">Habitación</label>
                <select class="form-control" id="ID_Habitacion" name="ID_Habitacion">
                    <option value="">Seleccione una habitación</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ID_Tarifa">Tarifa</label>
                <select class="form-control" id="ID_Tarifa" name="ID_Tarifa">
                    @foreach ($tarifas as $tarifa)
                        <option value="{{ $tarifa->ID_Tarifa }}">{{ $tarifa->DescripcionTar }} - Desde: {{ $tarifa->Desde }} Hasta: {{ $tarifa->Hasta }} Precio: {{ $tarifa->Precio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="Fecha_Llegada">Fecha de Llegada</label>
                <input type="date" class="form-control" id="Fecha_Llegada" name="Fecha_Llegada" required>
            </div>
            <div class="mb-3">
                <label for="Fecha_Salida">Fecha de Salida</label>
                <input type="date" class="form-control" id="Fecha_Salida" name="Fecha_Salida" required>
            </div>
            <div class="mb-3">
                <label for="Adultos">Adultos</label>
                <input type="number" class="form-control" id="Adultos" name="Adultos" required>
            </div>
            <div class="mb-3">
                <label for="Ninos">Niños</label>
                <input type="number" class="form-control" id="Ninos" name="Ninos">
            </div>
            <div class="mb-3">
                <label for="Solicitudes">Solicitudes Especiales</label>
                <textarea class="form-control" id="Solicitudes" name="Solicitudes"></textarea>
            </div>
            <div class="mb-3">
                <label for="Estado">Estado</label>
                <select class="form-control" id="Estado" name="Estado">
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmada">Confirmada</option>
                    <option value="cancelada">Cancelada</option>
                    <option value="completada">Completada</option>
                    <option value="en curso">En Curso</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="hora_entra">Hora de Entrada</label>
                <input type="time" class="form-control" id="hora_entra" name="hora_entra">
            </div>
            <div class="mb-3">
                <label for="hora_sale">Hora de Salida</label>
                <input type="time" class="form-control" id="hora_sale" name="hora_sale">
            </div>
        </fieldset>

        <fieldset class="border p-4 mb-4">
            <legend class="w-auto px-2">Acompañantes</legend>
            <div id="acompanantes-wrapper">
                <div class="acompanante">
                    <div class="mb-3">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" name="acompanantes[0][Nombre]">
                    </div>
                    <div class="mb-3">
                        <label for="Apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="acompanantes[0][Apellidos]">
                    </div>
                    <div class="mb-3">
                        <label for="Codigo_Postal">Código Postal</label>
                        <input type="text" class="form-control" name="acompanantes[0][Codigo_Postal]">
                    </div>
                    <div class="mb-3">
                        <label for="DNI">DNI</label>
                        <input type="text" class="form-control" name="acompanantes[0][DNI]">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nac">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="acompanantes[0][fecha_nac]">
                    </div>
                    <div class="mb-3">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" name="acompanantes[0][nacionalidad]">
                    </div>
                    <div class="mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="acompanantes[0][direccion]">
                    </div>
                    <div class="mb-3">
                        <label for="pais">País</label>
                        <input type="text" class="form-control" name="acompanantes[0][pais]">
                    </div>
                    <div class="mb-3">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="acompanantes[0][ciudad]">
                    </div>
                    <button type="button" class="btn btn-danger" onclick="borrarAcompanante(this)">Eliminar Acompañante</button>
                </div>
                <hr>
            </div>
            <button type="button" class="btn btn-secondary" onclick="anadirAcompanante()">Añadir Acompañante</button>
        </fieldset>

        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
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
    function activarClienteNue() {
        var tipoCliente = document.getElementById('cliente_tipo').value;
        if (tipoCliente === 'existente') {
            document.querySelectorAll('#cliente_nuevo input').forEach(input => input.disabled = true);
            document.querySelectorAll('#cliente_existente select').forEach(select => select.disabled = false);
            document.getElementById('cliente_existente').style.display = 'block';
            document.getElementById('cliente_nuevo').style.display = 'none';
        } else {
            document.querySelectorAll('#cliente_existente select').forEach(select => select.disabled = true);
            document.querySelectorAll('#cliente_nuevo input').forEach(input => input.disabled = false);
            document.getElementById('cliente_existente').style.display = 'none';
            document.getElementById('cliente_nuevo').style.display = 'block';
        }
    }

    function cargaHabs() {
        var tipoHabId = document.getElementById('ID_Tipo_Hab').value;
        var habitacionesSel = document.getElementById('ID_Habitacion');
        var fechaLlegada = document.getElementById('Fecha_Llegada').value;
        var fechaSalida = document.getElementById('Fecha_Salida').value;

        habitacionesSel.innerHTML = '<option value="">Cargando...</option>';

        if (tipoHabId && fechaLlegada && fechaSalida) {
            fetch(`/reservas/habitaciones/${tipoHabId}?Fecha_Llegada=${fechaLlegada}&Fecha_Salida=${fechaSalida}`)
                .then(response => response.json())
                .then(data => {
                    habitacionesSel.innerHTML = '<option value="">Selecciona una habitación</option>';
                    data.forEach(habitacion => {
                        habitacionesSel.innerHTML += `<option value="${habitacion.ID_Habitacion}">${habitacion.Num_hab}</option>`;
                    });
                })
                .catch(error => {
                    habitacionesSel.innerHTML = '<option value="">Error al cargar habitaciones</option>';
                    console.error('Error al cargar habitaciones:', error);
                });
        } else {
            habitacionesSel.innerHTML = '<option value="">Selecciona un tipo de habitación y fechas primero</option>';
        }
    }

    document.getElementById('Fecha_Llegada').addEventListener('change', cargaHabs);
    document.getElementById('Fecha_Salida').addEventListener('change', cargaHabs);


    function anadirAcompanante() {
        const wrapper = document.getElementById('acompanantes-wrapper');
        const index = wrapper.children.length;
        const acompHtml = `
            <div class="acompanante">
                <div class="mb-3">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][Nombre]">
                </div>
                <div class="mb-3">
                    <label for="Apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][Apellidos]">
                </div>
                <div class="mb-3">
                    <label for="Codigo_Postal">Código Postal</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][Codigo_Postal]">
                </div>
                <div class="mb-3">
                    <label for="DNI">DNI</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][DNI]">
                </div>
                <div class="mb-3">
                    <label for="fecha_nac">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="acompanantes[${index}][fecha_nac]">
                </div>
                <div class="mb-3">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][nacionalidad]">
                </div>
                <div class="mb-3">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][direccion]">
                </div>
                <div class="mb-3">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" name="acompanantes[${index}][pais]">
                </div>
                <div class="mb-3">
                    <label for="ciudad">Ciudad</label>
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

    document.addEventListener('DOMContentLoaded', function() {
        toggleClienteFields();
    });
</script>
@endsection

