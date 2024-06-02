

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Reservas</h1>
    <a href="<?php echo e(route('reservas.create')); ?>" class="btn btn-primary">Crear Reserva</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Llegada</th>
                <th>Fecha Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($reserva->id); ?></td>
                <td><?php echo e($reserva->Fecha_Llegada->format('d-m-Y')); ?></td>
                <td><?php echo e($reserva->Fecha_Salida->format('d-m-Y')); ?></td>
                <td>
                    <a href="<?php echo e(route('reservas.show', $reserva->id)); ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="<?php echo e(route('reservas.edit', $reserva->id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                    <form action="<?php echo e(route('reservas.destroy', $reserva->id)); ?>" method="POST" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fernando\Desktop\ProyectoPMS\laragon\www\roomeo\resources\views/reservas/index.blade.php ENDPATH**/ ?>