

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Nuevo Cliente</h1>
    <form method="POST" action="<?php echo e(route('clientes.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
        </div>
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="DNI" name="DNI" required>
        </div>
        <div class="mb-3">
            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" required>
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="Fecha_nacimiento" name="Fecha_nacimiento" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" required>
        </div>
        <div class="mb-3">
            <label for="Codigo_Postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" required>
        </div>
        <div class="mb-3">
            <label for="Ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" required>
        </div>
        <div class="mb-3">
            <label for="Pais" class="form-label">País</label>
            <input type="text" class="form-control" id="Pais" name="Pais" required>
        </div>
        <div class="mb-3">
            <label for="Tarjeta_Cred" class="form-label">Tarjeta de Crédito (opcional)</label>
            <input type="text" class="form-control" id="Tarjeta_Cred" name="Tarjeta_Cred">
        </div>
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/clientes/create.blade.php ENDPATH**/ ?>