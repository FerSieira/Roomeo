

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Nuevo Acompañante</h1>
    <form method="POST" action="<?php echo e(route('acompanantes.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
        </div>
        <div class="mb-3">
            <label for="Codigo_Postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" required>
        </div>
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="DNI" name="DNI" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_nac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="Fecha_nac" name="Fecha_nac" required>
        </div>
        <div class="mb-3">
            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" required>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" required>
        </div>
        <div class="mb-3">
            <label for="Pais" class="form-label">País</label>
            <input type="text" class="form-control" id="Pais" name="Pais" required>
        </div>
        <div class="mb-3">
            <label for="Ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Acompañante</button>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/acompanantes/create.blade.php ENDPATH**/ ?>