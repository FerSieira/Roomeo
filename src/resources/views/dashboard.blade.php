@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a Roomson</h1>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card text-dark bg-light mb-3">
                <div class="card-body">
                    <h4 class="card-title">Hora Actual</h4>
                    <p class="card-text display-4" id="reloj"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h4 class="card-title">Entradas</h4>
                    <p class="card-text display-4">{{ $reservasPendientesHoy }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h4 class="card-title">Salidas</h4>
                    <p class="card-text display-4">{{ $salidasHoy }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h4 class="card-title">Clientes Hospedados</h4>
                    <p class="card-text display-4">{{ $clientesHospedados }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h4 class="card-title">Hab. Libres</h4>
                    <p class="card-text display-4">{{ $habitacionesLibres }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h4 class="card-title">Hab. Ocupadas</h4>
                    <p class="card-text display-4">{{ $habitacionesOcupadas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h4 class="card-title">Hab. Sucias</h4>
                    <p class="card-text display-4">{{ $habitacionesSucias }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h4 class="card-title">Hab. Bloqueadas</h4>
                    <p class="card-text display-4">{{ $habitacionesBloqueadas }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function actualizarReloj() {
        var ahora = new Date();
        var horas = String(ahora.getHours()).padStart(2, '0');
        var minutos = String(ahora.getMinutes()).padStart(2, '0');
        var segundos = String(ahora.getSeconds()).padStart(2, '0');
        var horaActual = horas + ':' + minutos + ':' + segundos;

        console.log("Hora Actual: ", horaActual);
        var relojElemento = document.getElementById('reloj');
        if (relojElemento) {
            console.log("Elemento del reloj encontrado:", relojElemento);
            relojElemento.textContent = horaActual;
        } else {
            console.log("Elemento del reloj no encontrado.");
        }
    }

    setInterval(actualizarReloj, 1000);

    actualizarReloj();
</script>
@endsection


