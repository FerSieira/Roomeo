

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Nuevo Tipo de Habitación</h1>
    <form method="POST" action="<?php echo e(route('tipo-habitaciones.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="Nombre_Tipo" class="form-label">Nombre del Tipo de Habitación</label>
            <input type="text" class="form-control" id="Nombre_Tipo" name="Nombre_Tipo" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label for="Capacidad" class="form-label">Capacidad</label>
            <input type="number" class="form-control" id="Capacidad" name="Capacidad" required min="1">
        </div>
        <button type="submit" class="btn btn-primary">Crear Tipo de Habitación</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fernando\Desktop\ProyectoPMS\laragon\www\roomeo\resources\views/tipo_habitaciones/create.blade.php ENDPATH**/ ?>