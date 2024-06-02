

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Tipo de Habitación</h1>
    <form method="POST" action="<?php echo e(route('tipohabitaciones.update', ['tipohabitacione' => $tipohabitacione->ID_Tipo_Hab])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Nombre_Tipo" class="form-label">Nombre del Tipo de Habitación</label>
            <input type="text" class="form-control" id="Nombre_Tipo" name="Nombre_Tipo" value="<?php echo e($tipohabitacione->Nombre_Tipo); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion"><?php echo e($tipohabitacione->Descripcion); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="Capacidad" class="form-label">Capacidad</label>
            <input type="number" class="form-control" id="Capacidad" name="Capacidad" value="<?php echo e($tipohabitacione->Capacidad); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tipo de Habitación</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/tipo_habitaciones/edit.blade.php ENDPATH**/ ?>