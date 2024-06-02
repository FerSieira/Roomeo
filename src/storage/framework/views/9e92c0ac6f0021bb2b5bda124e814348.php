

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Acompañantes</h1>
    <a href="<?php echo e(route('acompanantes.create')); ?>" class="btn btn-primary">Crear Nuevo Acompañante</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $acompanantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acompanante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($acompanante->ID_Acompanante); ?></td>
                <td><?php echo e($acompanante->Nombre); ?></td>
                <td><?php echo e($acompanante->Apellidos); ?></td>
                <td><?php echo e($acompanante->DNI); ?></td>
                <td>
                    <a href="<?php echo e(route('acompanantes.show', $acompanante->ID_Acompanante)); ?>" class="btn btn-info">Ver</a>
                    <a href="<?php echo e(route('acompanantes.edit', $acompanante->ID_Acompanante)); ?>" class="btn btn-primary">Editar</a>
                    <form action="<?php echo e(route('acompanantes.destroy', $acompanante->ID_Acompanante)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer eliminar este acompañante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/acompanantes/index.blade.php ENDPATH**/ ?>