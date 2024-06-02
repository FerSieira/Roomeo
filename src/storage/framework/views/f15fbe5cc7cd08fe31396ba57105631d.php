

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e(isset($tarifa) ? 'Editar Tarifa' : 'Crear Tarifa'); ?></h1>
    <form action="<?php echo e(isset($tarifa) ? route('tarifas.update', $tarifa->ID_Tarifa) : route('tarifas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($tarifa)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="mb-3">
            <label for="DescripcionTar" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="DescripcionTar" name="DescripcionTar" required value="<?php echo e($tarifa->DescripcionTar ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="Desde" class="form-label">Desde</label>
            <input type="date" class="form-control" id="Desde" name="Desde" required value="<?php echo e($tarifa->Desde ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="Hasta" class="form-label">Hasta</label>
            <input type="date" class="form-control" id="Hasta" name="Hasta" required value="<?php echo e($tarifa->Hasta ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="Precio" class="form-label">Precio (€)</label>
            <input type="number" class="form-control" step="0.01" id="Precio" name="Precio" required value="<?php echo e($tarifa->Precio ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="Ocupacion" class="form-label">Ocupación (%)</label>
            <input type="number" class="form-control" id="Ocupacion" name="Ocupacion" required value="<?php echo e($tarifa->Ocupacion ?? ''); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/tarifas/create.blade.php ENDPATH**/ ?>