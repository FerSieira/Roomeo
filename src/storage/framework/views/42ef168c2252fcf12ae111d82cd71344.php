

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Acompañante</h1>
    <form method="POST" action="<?php echo e(route('acompanantes.update', $acompanante->ID_Acompanante)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo e($acompanante->Nombre); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="<?php echo e($acompanante->Apellidos); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Codigo_Postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" value="<?php echo e($acompanante->Codigo_Postal); ?>" required>
        </div>
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="DNI" name="DNI" value="<?php echo e($acompanante->DNI); ?>" required>
        </div>
        <div class="mb-3">
            <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo e($acompanante->fecha_nac); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo e($acompanante->nacionalidad); ?>" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e($acompanante->direccion); ?>" required>
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="<?php echo e($acompanante->pais); ?>" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo e($acompanante->ciudad); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Acompañante</button>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/acompanantes/edit.blade.php ENDPATH**/ ?>