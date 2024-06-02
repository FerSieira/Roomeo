

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Reservas de Servicios</h1>
    <a href="<?php echo e(route('reserva_servicios.create')); ?>" class="btn btn-primary">Crear Nueva Reserva de Servicio</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reserva</th>
                <th>Servicio</th>
                <th>Empleado</th>
                <th>Día y Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reservaServicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservaServicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($reservaServicio->ID_RS); ?></td>
                <td><?php echo e($reservaServicio->reserva->ID_Reservas); ?></td>
                <td><?php echo e($reservaServicio->servicio->Nombre); ?></td>
                <td><?php echo e($reservaServicio->empleado->Nombre); ?></td>
                <td><?php echo e($reservaServicio->Dia_Hora); ?></td>
                <td>
                    <a href="<?php echo e(route('reserva_servicios.show', $reservaServicio->ID_RS)); ?>" class="btn btn-info">Ver</a>
                    <a href="<?php echo e(route('reserva_servicios.edit', $reservaServicio->ID_RS)); ?>" class="btn btn-primary">Editar</a>
                    <form action="<?php echo e(route('reserva_servicios.destroy', $reservaServicio->ID_RS)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta reserva de servicio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/reserva_servicios/index.blade.php ENDPATH**/ ?>