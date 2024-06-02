

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Servicio</h1>
    <form action="<?php echo e(route('servicios.update', $servicio->ID_Servicio)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo e($servicio->Nombre); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" required><?php echo e($servicio->Descripcion); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="Activo" class="form-label">Activo</label>
            <select class="form-control" id="Activo" name="Activo" required>
                <option value="1" <?php echo e($servicio->Activo ? 'selected' : ''); ?>>Sí</option>
                <option value="0" <?php echo e(!$servicio->Activo ? 'selected' : ''); ?>>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="Precio" name="Precio" value="<?php echo e($servicio->Precio); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?php echo e(route('servicios.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/servicios/edit.blade.php ENDPATH**/ ?>