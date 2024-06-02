

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Empleado</h1>
    <form action="<?php echo e(route('empleados.store')); ?>" method="POST">
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
            <label for="Departamento" class="form-label">Departamento</label>
            <select class="form-control" id="Departamento" name="Departamento" required>
                <option value="Recepcion">Recepción</option>
                <option value="Pisos">Pisos</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="Usuario" name="Usuario" required>
        </div>
        <div class="mb-3">
            <label for="Contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="Contraseña" name="Contraseña" required>
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="mb-3">
            <label for="Rol" class="form-label">Rol</label>
            <select class="form-control" id="Rol" name="Rol" required>
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo e(route('empleados.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/empleados/create.blade.php ENDPATH**/ ?>