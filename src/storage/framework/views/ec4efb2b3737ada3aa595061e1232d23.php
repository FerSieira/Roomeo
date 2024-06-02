

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles del Tipo de Habitación</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($tipohabitacion->Nombre_Tipo); ?></h5>
            <p class="card-text"><strong>Descripción:</strong> <?php echo e($tipohabitacion->Descripcion); ?></p>
            <p class="card-text"><strong>Capacidad:</strong> <?php echo e($tipohabitacion->Capacidad); ?></p>
            <a href="<?php echo e(route('tipohabitaciones.edit', ['tipohabitacion' => $tipohabitacion->ID_Tipo_Hab])); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('tipohabitaciones.destroy', ['tipohabitacion' => $tipohabitacion->ID_Tipo_Hab])); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este tipo de habitación?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/tipo_habitaciones/show.blade.php ENDPATH**/ ?>