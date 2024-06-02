

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles del Empleado</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($empleado->Nombre); ?> <?php echo e($empleado->Apellidos); ?></h5>
            <p class="card-text"><strong>Departamento:</strong> <?php echo e($empleado->Departamento); ?></p>
            <p class="card-text"><strong>Usuario:</strong> <?php echo e($empleado->Usuario); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo e($empleado->Email); ?></p>
            <p class="card-text"><strong>Teléfono:</strong> <?php echo e($empleado->Telefono); ?></p>
            <p class="card-text"><strong>Rol:</strong> <?php echo e($empleado->Rol); ?></p>
            <a href="<?php echo e(route('empleados.edit', $empleado->ID_Empleado)); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('empleados.destroy', $empleado->ID_Empleado)); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este empleado?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/empleados/show.blade.php ENDPATH**/ ?>