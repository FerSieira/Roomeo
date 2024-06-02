

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Servicios</h1>
    <a href="<?php echo e(route('servicios.create')); ?>" class="btn btn-primary mb-3">Crear Servicio</a>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($servicio->ID_Servicio); ?></td>
                    <td><?php echo e($servicio->Nombre); ?></td>
                    <td><?php echo e($servicio->Descripcion); ?></td>
                    <td><?php echo e($servicio->Activo ? 'Sí' : 'No'); ?></td>
                    <td><?php echo e($servicio->Precio); ?></td>
                    <td>
                        <a href="<?php echo e(route('servicios.show', $servicio->ID_Servicio)); ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="<?php echo e(route('servicios.edit', $servicio->ID_Servicio)); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="<?php echo e(route('servicios.destroy', $servicio->ID_Servicio)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este servicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/servicios/index.blade.php ENDPATH**/ ?>