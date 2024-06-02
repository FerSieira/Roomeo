

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalle de Reserva</h1>
    <div class="mb-3">
        <p><strong>Fecha de Llegada:</strong> <?php echo e($reserva->Fecha_Llegada ? $reserva->Fecha_Llegada->format('d-m-Y') : 'Fecha no disponible'); ?></p>
        <p><strong>Fecha de Salida:</strong> <?php echo e($reserva->Fecha_Salida ? $reserva->Fecha_Salida->format('d-m-Y') : 'Fecha no disponible'); ?></p>
        <p><strong>Estado:</strong> <?php echo e($reserva->Estado); ?></p>
        <p><strong>Adultos:</strong> <?php echo e($reserva->Adultos); ?></p>
        <p><strong>Niños:</strong> <?php echo e($reserva->Ninos ?? 'N/A'); ?></p>
        <p><strong>Hora de Entrada:</strong> <?php echo e($reserva->hora_entra ?? 'No especificado'); ?></p>
        <p><strong>Hora de Salida:</strong> <?php echo e($reserva->hora_sale ?? 'No especificado'); ?></p>
        <p><strong>Solicitudes Especiales:</strong> <?php echo e($reserva->Solicitudes ?? 'Ninguna'); ?></p>
    </div>

    <div class="mb-3">
        <p><strong>Cliente:</strong> <?php echo e($reserva->cliente->Nombre); ?> <?php echo e($reserva->cliente->Apellidos); ?></p>
        <p><strong>Tipo de Habitación:</strong> <?php echo e($reserva->tipoHabitacion->Nombre_Tipo); ?></p>
        <p><strong>Habitación Asignada:</strong> <?php echo e($reserva->habitacion->Num_hab); ?></p>
        <p><strong>Tarifa Aplicada:</strong> <?php echo e($reserva->tarifa->DescripcionTar); ?> - $<?php echo e($reserva->tarifa->Precio); ?></p>
    </div>

    <div class="mb-3">
        <a href="<?php echo e(route('reservas.edit', ['reserva' => $reserva->ID_Reservas])); ?>" class="btn btn-primary">Editar</a>
        <form action="<?php echo e(route('reservas.destroy', ['reserva' => $reserva->ID_Reservas])); ?>" method="POST" style="display: inline-block;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/reservas/show.blade.php ENDPATH**/ ?>