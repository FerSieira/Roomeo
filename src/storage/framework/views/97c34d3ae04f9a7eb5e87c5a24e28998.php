

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles de la Reserva de Servicio</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reserva: <?php echo e($reservaServicio->reserva->ID_Reservas); ?></h5>
            <p class="card-text"><strong>Servicio:</strong> <?php echo e($reservaServicio->servicio->Nombre); ?></p>
            <p class="card-text"><strong>Empleado:</strong> <?php echo e($reservaServicio->empleado->Nombre); ?></p>
            <p class="card-text"><strong>Día y Hora:</strong> <?php echo e($reservaServicio->Dia_Hora); ?></p>
            <a href="<?php echo e(route('reserva_servicios.edit', $reservaServicio->ID_RS)); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('reserva_servicios.destroy', $reservaServicio->ID_RS)); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta reserva de servicio?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/reserva_servicios/show.blade.php ENDPATH**/ ?>