

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Reserva</h1>
    <form action="<?php echo e(route('reservas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="ID_Cliente">Cliente</label>
            <select class="form-control" id="ID_Cliente" name="ID_Cliente">
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cliente->ID_Cliente); ?>"><?php echo e($cliente->Nombre); ?> <?php echo e($cliente->Apellidos); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Tipo_Hab">Tipo de Habitación</label>
            <select class="form-control" id="ID_Tipo_Hab" name="ID_Tipo_Hab">
                <?php $__currentLoopData = $tipoHabitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tipo->ID_Tipo_Hab); ?>"><?php echo e($tipo->Nombre_Tipo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Habitacion">Habitación</label>
            <select class="form-control" id="ID_Habitacion" name="ID_Habitacion">
                <?php $__currentLoopData = $habitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($habitacion->ID_Habitacion); ?>"><?php echo e($habitacion->Num_hab); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ID_Tarifa">Tarifa</label>
            <select class="form-control" id="ID_Tarifa" name="ID_Tarifa">
                <?php $__currentLoopData = $tarifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarifa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tarifa->ID_Tarifa); ?>"><?php echo e($tarifa->DescripcionTar); ?> - Desde: <?php echo e($tarifa->Desde); ?> Hasta: <?php echo e($tarifa->Hasta); ?> Precio: <?php echo e($tarifa->Precio); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="Fecha_Llegada">Fecha de Llegada</label>
            <input type="date" class="form-control" id="Fecha_Llegada" name="Fecha_Llegada" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_Salida">Fecha de Salida</label>
            <input type="date" class="form-control" id="Fecha_Salida" name="Fecha_Salida" required>
        </div>
        <div class="mb-3">
            <label for="Adultos">Adultos</label>
            <input type="number" class="form-control" id="Adultos" name="Adultos" required>
        </div>
        <div class="mb-3">
            <label for="Ninos">Niños</label>
            <input type="number" class="form-control" id="Ninos" name="Ninos">
        </div>
        <div class="mb-3">
            <label for="Solicitudes">Solicitudes Especiales</label>
            <textarea class="form-control" id="Solicitudes" name="Solicitudes"></textarea>
        </div>
        <div class="mb-3">
            <label for="Estado">Estado</label>
            <select class="form-control" id="Estado" name="Estado">
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
                <option value="completada">Completada</option>
                <option value="en curso">En Curso</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="hora_entra">Hora de Entrada</label>
            <input type="time" class="form-control" id="hora_entra" name="hora_entra">
        </div>
        <div class="mb-3">
            <label for="hora_sale">Hora de Salida</label>
            <input type="time" class="form-control" id="hora_sale" name="hora_sale">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
    </form>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/reservas/create.blade.php ENDPATH**/ ?>