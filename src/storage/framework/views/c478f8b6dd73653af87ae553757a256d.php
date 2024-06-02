

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tipos de Habitación</h1>
    <a href="<?php echo e(route('tipo-habitaciones.create')); ?>" class="btn btn-primary">Crear Nuevo Tipo de Habitación</a>

    <?php if($tiposHabitacion->count() > 0): ?>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tiposHabitacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($tipo->ID_Tipo_Hab); ?></td>
                    <td><?php echo e($tipo->Nombre_Tipo); ?></td>
                    <td><?php echo e($tipo->Descripcion); ?></td>
                    <td><?php echo e($tipo->Capacidad); ?></td>
                    <td>
                        <a href="<?php echo e(route('tipo-habitaciones.show', ['tipoHabitacion' => $tipo->ID_Tipo_Hab])); ?>" class="btn btn-info">Mostrar</a>
                        <a href="<?php echo e(route('tipo-habitaciones.edit', ['tipoHabitacion' => $tipo->ID_Tipo_Hab])); ?>" class="btn btn-primary">Editar</a>
                        <form action="<?php echo e(route('tipo-habitaciones.destroy', ['tipoHabitacion' => $tipo->ID_Tipo_Hab])); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este tipo de habitación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay tipos de habitación disponibles. Por favor, crea uno.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fernando\Desktop\ProyectoPMS\laragon\www\roomeo\resources\views/tipo_habitaciones/index.blade.php ENDPATH**/ ?>