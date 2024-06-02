

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles del Servicio</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($servicio->Nombre); ?></h5>
            <p class="card-text"><strong>Descripción:</strong> <?php echo e($servicio->Descripcion); ?></p>
            <p class="card-text"><strong>Activo:</strong> <?php echo e($servicio->Activo ? 'Sí' : 'No'); ?></p>
            <p class="card-text"><strong>Precio:</strong> <?php echo e($servicio->Precio); ?></p>
            <a href="<?php echo e(route('servicios.edit', $servicio->ID_Servicio)); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('servicios.destroy', $servicio->ID_Servicio)); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este servicio?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/servicios/show.blade.php ENDPATH**/ ?>