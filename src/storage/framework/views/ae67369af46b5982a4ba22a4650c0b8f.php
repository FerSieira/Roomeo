

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Reserva</h1>
    <form method="POST" action="<?php echo e(route('reservas.update', $reserva->ID_Reservas)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Fecha_Llegada" class="form-label">Fecha de Llegada</label>
            <input type="date" class="form-control" id="Fecha_Llegada" name="Fecha_Llegada" value="<?php echo e($reserva->Fecha_Llegada); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_Salida" class="form-label">Fecha de Salida</label>
            <input type="date" class="form-control" id="Fecha_Salida" name="Fecha_Salida" value="<?php echo e($reserva->Fecha_Salida); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Adultos" class="form-label">Número de Adultos</label>
            <input type="number" class="form-control" id="Adultos" name="Adultos" value="<?php echo e($reserva->Adultos); ?>" min="1" required>
        </div>
        <div class="mb-3">
            <label for="Ninos" class="form-label">Número de Niños</label>
            <input type="number" class="form-control" id="Ninos" name="Ninos" value="<?php echo e($reserva->Ninos); ?>">
        </div>
        <div class="mb-3">
            <label for="Solicitudes" class="form-label">Solicitudes Especiales</label>
            <textarea class="form-control" id="Solicitudes" name="Solicitudes"><?php echo e($reserva->Solicitudes); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/reservas/edit.blade.php ENDPATH**/ ?>