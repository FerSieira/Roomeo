

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tarifas</h1>
    <a href="<?php echo e(route('tarifas.create')); ?>" class="btn btn-primary">Crear Nueva Tarifa</a>
    <div class="list-group mt-3">
        <?php $__currentLoopData = $tarifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarifa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('tarifas.show', $tarifa->ID_Tarifa)); ?>" class="list-group-item list-group-item-action">
                <?php echo e($tarifa->DescripcionTar); ?> - <?php echo e($tarifa->Precio); ?> €
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/tarifas/index.blade.php ENDPATH**/ ?>