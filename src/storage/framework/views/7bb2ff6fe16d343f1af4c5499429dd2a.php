

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Nueva Habitación</h1>
    <form method="POST" action="<?php echo e(route('habitaciones.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="Num_hab" class="form-label">Número de Habitación</label>
            <input type="text" class="form-control" id="Num_hab" name="Num_hab" required>
        </div>
        <div class="mb-3">
            <label for="Planta" class="form-label">Planta</label>
            <input type="number" class="form-control" id="Planta" name="Planta" required>
        </div>
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado</label>
            <select class="form-control" id="Estado" name="Estado" required>
                <option value="Limpia">Limpia</option>
                <option value="Sucia">Sucia</option>
                <option value="Ocupada">Ocupada</option>
                <option value="Libre">Libre</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Tipo_Hab" class="form-label">Tipo de Habitación</label>
            <select class="form-control" id="ID_Tipo_Hab" name="ID_Tipo_Hab">
                <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tipo->ID_Tipo_Hab); ?>"><?php echo e($tipo->Nombre_Tipo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Habitación</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fernando\Desktop\ProyectoPMS\laragon\www\roomeo\resources\views/habitaciones/create.blade.php ENDPATH**/ ?>