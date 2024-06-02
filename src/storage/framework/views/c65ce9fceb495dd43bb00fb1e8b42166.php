

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles del Acompañante</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($acompanante->Nombre); ?> <?php echo e($acompanante->Apellidos); ?></h5>
            <p class="card-text"><strong>DNI:</strong> <?php echo e($acompanante->DNI); ?></p>
            <p class="card-text"><strong>Fecha de Nacimiento:</strong> <?php echo e($acompanante->fecha_nac); ?></p>
            <p class="card-text"><strong>Nacionalidad:</strong> <?php echo e($acompanante->nacionalidad); ?></p>
            <p class="card-text"><strong>Dirección:</strong> <?php echo e($acompanante->direccion); ?></p>
            <p class="card-text"><strong>Ciudad:</strong> <?php echo e($acompanante->ciudad); ?></p>
            <p class="card-text"><strong>País:</strong> <?php echo e($acompanante->pais); ?></p>
            <a href="<?php echo e(route('acompanantes.edit', $acompanante->ID_Acompanante)); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('acompanantes.destroy', $acompanante->ID_Acompanante)); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este acompañante?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/acompanantes/show.blade.php ENDPATH**/ ?>