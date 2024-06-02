

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles de la Tarifa</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($tarifa->DescripcionTar); ?></h5>
            <p class="card-text"><strong>Desde:</strong> <?php echo e(\Carbon\Carbon::parse($tarifa->Desde)->format('d-m-Y')); ?></p>
            <p class="card-text"><strong>Hasta:</strong> <?php echo e(\Carbon\Carbon::parse($tarifa->Hasta)->format('d-m-Y')); ?></p>
            <p class="card-text"><strong>Precio:</strong> <?php echo e($tarifa->Precio); ?></p>
            <p class="card-text"><strong>Ocupación:</strong> <?php echo e($tarifa->Ocupacion); ?></p>
            <a href="<?php echo e(route('tarifas.edit', $tarifa->ID_Tarifa)); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('tarifas.destroy', $tarifa->ID_Tarifa)); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta tarifa?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/tarifas/show.blade.php ENDPATH**/ ?>