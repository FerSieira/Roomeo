
<!-- Incluye Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <h3>Reservas de Hoy</h3>
            <p>Entradas: <?php echo e($reservasInicioHoy); ?></p>
            <p>Salidas: <?php echo e($reservasFinHoy); ?></p>
        </div>
        <div class="col-md-6">
            <h3>Estado de Habitaciones</h3>
            <p>Total Habitaciones: <?php echo e($totalHabitaciones); ?></p>
            <p>Disponibles: <?php echo e($habitacionesDisponibles); ?></p>
            <p>Ocupadas: <?php echo e($habitacionesOcupadas); ?></p>
            <p>Sucias: <?php echo e($habitacionesSucias); ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/menuprincipal.blade.php ENDPATH**/ ?>