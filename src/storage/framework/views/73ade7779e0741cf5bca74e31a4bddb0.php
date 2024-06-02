

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Habitaciones</h1>
    <a href="<?php echo e(route('habitaciones.create')); ?>" class="btn btn-primary">Crear Nueva Habitación</a>
    <a href="<?php echo e(route('tipohabitaciones.create')); ?>" class="btn btn-secondary">Crear Nuevo Tipo de Habitación</a>
    <a href="<?php echo e(route('tipohabitaciones.index')); ?>" class="btn btn-info">Ver Tipos de Habitación</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Habitación</th>
                <th>Planta</th>
                <th>Estado</th>
                <th>Tipo de Habitación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $habitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($habitacion->ID_Habitacion); ?></td>
                <td><?php echo e($habitacion->Num_hab); ?></td>
                <td><?php echo e($habitacion->Planta); ?></td>
                <td><?php echo e($habitacion->Estado); ?></td>
                <td><?php echo e($habitacion->tipoHabitacion->Nombre_Tipo); ?></td>
                <td>
                    <a href="<?php echo e(route('habitaciones.edit', ['habitacion' => $habitacion->ID_Habitacion])); ?>" class="btn btn-info">Editar</a>
                    <form action="<?php echo e(route('habitaciones.destroy', ['habitacion' => $habitacion->ID_Habitacion])); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Está seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/habitaciones/index.blade.php ENDPATH**/ ?>