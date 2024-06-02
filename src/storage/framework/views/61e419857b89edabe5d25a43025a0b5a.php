

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Cliente</h1>
    <form method="POST" action="<?php echo e(route('clientes.update', $cliente->ID_Cliente)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo e($cliente->Nombre); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="<?php echo e($cliente->Apellidos); ?>" required>
        </div>
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="DNI" name="DNI" value="<?php echo e($cliente->DNI); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" value="<?php echo e($cliente->Nacionalidad); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo e($cliente->Telefono); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="Fecha_nacimiento" name="Fecha_nacimiento" value="<?php echo e($cliente->Fecha_nacimiento); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="<?php echo e($cliente->Email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo e($cliente->Direccion); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Codigo_Postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" value="<?php echo e($cliente->Codigo_Postal); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Ciudad" the form-label">Ciudad</label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" value="<?php echo e($cliente->Ciudad); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Pais" class="form-label">País</label>
            <input type="text" class="form-control" id="Pais" name="Pais" value="<?php echo e($cliente->Pais); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Tarjeta_Cred" class="form-label">Tarjeta de Crédito (opcional)</label>
            <input type="text" class="form-control" id="Tarjeta_Cred" name="Tarjeta_Cred" value="<?php echo e($cliente->Tarjeta_Cred); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/clientes/edit.blade.php ENDPATH**/ ?>