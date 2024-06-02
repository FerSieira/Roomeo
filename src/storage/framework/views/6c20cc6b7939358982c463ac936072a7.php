

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Reserva de Servicio</h1>
    <form method="POST" action="<?php echo e(route('reserva_servicios.update', $reservaServicio->ID_RS)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="ID_Reserva" class="form-label">Reserva</label>
            <select class="form-control" id="ID_Reserva" name="ID_Reserva" required>
                <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($reserva->ID_Reservas); ?>" <?php echo e($reserva->ID_Reservas == $reservaServicio->ID_Reserva ? 'selected' : ''); ?>><?php echo e($reserva->ID_Reservas); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Servicio" class="form-label">Servicio</label>
            <select class="form-control" id="ID_Servicio" name="ID_Servicio" required>
                <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($servicio->ID_Servicio); ?>" <?php echo e($servicio->ID_Servicio == $reservaServicio->ID_Servicio ? 'selected' : ''); ?>><?php echo e($servicio->Nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Empleado" class="form-label">Empleado</label>
            <select class="form-control" id="ID_Empleado" name="ID_Empleado" required>
                <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($empleado->ID_Empleado); ?>" <?php echo e($empleado->ID_Empleado == $reservaServicio->ID_Empleado ? 'selected' : ''); ?>><?php echo e($empleado->Nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="Dia_Hora" class="form-label">Día y Hora</label>
            <input type="datetime-local" class="form-control" id="Dia_Hora" name="Dia_Hora" value="<?php echo e(date('Y-m-d\TH:i', strtotime($reservaServicio->Dia_Hora))); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Reserva de Servicio</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProyectoFCT\laragon\www\roomeo\resources\views/reserva_servicios/edit.blade.php ENDPATH**/ ?>