

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Empleados</h1>
    <a href="<?php echo e(route('empleados.create')); ?>" class="btn btn-primary mb-3">Crear Empleado</a>
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
                <th>Apellidos</th>
                <th>Departamento</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($empleado->ID_Empleado); ?></td>
                    <td><?php echo e($empleado->Nombre); ?></td>
                    <td><?php echo e($empleado->Apellidos); ?></td>
                    <td><?php echo e($empleado->Departamento); ?></td>
                    <td><?php echo e($empleado->Usuario); ?></td>
                    <td><?php echo e($empleado->Email); ?></td>
                    <td><?php echo e($empleado->Rol); ?></td>
                    <td>
                        <a href="<?php echo e(route('empleados.show', $empleado->ID_Empleado)); ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="<?php echo e(route('empleados.edit', $empleado->ID_Empleado)); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="<?php echo e(route('empleados.destroy', $empleado->ID_Empleado)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/empleados/index.blade.php ENDPATH**/ ?>