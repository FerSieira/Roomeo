

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Empleado</h1>
    <form action="<?php echo e(route('empleados.update', $empleado->ID_Empleado)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo e($empleado->Nombre); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="<?php echo e($empleado->Apellidos); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Departamento" class="form-label">Departamento</label>
            <select class="form-control" id="Departamento" name="Departamento" required>
                <option value="Recepcion" <?php echo e($empleado->Departamento == 'Recepcion' ? 'selected' : ''); ?>>Recepción</option>
                <option value="Pisos" <?php echo e($empleado->Departamento == 'Pisos' ? 'selected' : ''); ?>>Pisos</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="Usuario" name="Usuario" value="<?php echo e($empleado->Usuario); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Contraseña" class="form-label">Contraseña (dejar en blanco para mantener la actual)</label>
            <input type="password" class="form-control" id="Contraseña" name="Contraseña">
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo e($empleado->Telefono); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="<?php echo e($empleado->Email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Rol" class="form-label">Rol</label>
            <select class="form-control" id="Rol" name="Rol" required>
                <option value="usuario" <?php echo e($empleado->Rol == 'usuario' ? 'selected' : ''); ?>>Usuario</option>
                <option value="administrador" <?php echo e($empleado->Rol == 'administrador' ? 'selected' : ''); ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?php echo e(route('empleados.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/empleados/edit.blade.php ENDPATH**/ ?>