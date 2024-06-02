

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Clientes</h1>
    <a href="<?php echo e(route('clientes.create')); ?>" class="btn btn-primary">Crear Nuevo Cliente</a>
    <a href="<?php echo e(route('acompanantes.index')); ?>" class="btn btn-secondary">Ver Acompañantes</a>
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
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cliente->ID_Cliente); ?></td>
                <td><?php echo e($cliente->Nombre); ?></td>
                <td><?php echo e($cliente->Apellidos); ?></td>
                <td><?php echo e($cliente->DNI); ?></td>
                <td>
                    <a href="<?php echo e(route('clientes.show', $cliente->ID_Cliente)); ?>" class="btn btn-info">Ver</a>
                    <a href="<?php echo e(route('clientes.edit', $cliente->ID_Cliente)); ?>" class="btn btn-primary">Editar</a>
                    <form action="<?php echo e(route('clientes.destroy', $cliente->ID_Cliente)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/clientes/index.blade.php ENDPATH**/ ?>