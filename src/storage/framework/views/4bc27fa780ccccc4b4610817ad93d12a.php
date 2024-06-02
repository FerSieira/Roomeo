

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Habitación</h1>
    <form method="POST" action="<?php echo e(route('habitaciones.update', $habitacion->ID_Habitacion)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Num_hab" class="form-label">Número de Habitación</label>
            <input type="text" class="form-control" id="Num_hab" name="Num_hab" value="<?php echo e($habitacion->Num_hab); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Planta" class="form-label">Planta</label>
            <input type="number" class="form-control" id="Planta" name="Planta" value="<?php echo e($habitacion->Planta); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado</label>
            <select class="form-control" id="Estado" name="Estado" required>
                <option value="Limpia" <?php echo e($habitacion->Estado == 'Limpia' ? 'selected' : ''); ?>>Limpia</option>
                <option value="Sucia" <?php echo e($habitacion->Estado == 'Sucia' ? 'selected' : ''); ?>>Sucia</option>
                <option value="Ocupada" <?php echo e($habitacion->Estado == 'Ocupada' ? 'selected' : ''); ?>>Ocupada</option>
                <option value="Libre" <?php echo e($habitacion->Estado == 'Libre' ? 'selected' : ''); ?>>Libre</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Tipo_Hab" class="form-label">Tipo de Habitación</label>
            <select class="form-control" id="ID_Tipo_Hab" name="ID_Tipo_Hab">
                <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tipo->ID_Tipo_Hab); ?>" <?php echo e($habitacion->ID_Tipo_Hab == $tipo->ID_Tipo_Hab ? 'selected' : ''); ?>>
                        <?php echo e($tipo->Nombre_Tipo); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Habitación</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fernando\Desktop\ProyectoPMS\laragon\www\roomeo\resources\views/habitaciones/edit.blade.php ENDPATH**/ ?>