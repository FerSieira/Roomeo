

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Nueva Reserva</h1>
    <form method="POST" action="<?php echo e(route('reservas.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="ID_Cliente" class="form-label">Cliente</label>
            <select class="form-control" id="ID_Cliente" name="ID_Cliente" required>
                <?php $__currentLoopData = \App\Models\Cliente::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->ID_Cliente); ?>"><?php echo e($cliente->Nombre); ?> <?php echo e($cliente->Apellidos); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ID_Habitacion" class="form-label">Habitación</label>
            <select class="form-control" id="ID_Habitacion" name="ID_Habitacion" required>
                <?php $__currentLoopData = \App\Models\Habitacion::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($habitacion->ID_Habitacion); ?>"><?php echo e($habitacion->Num_hab); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="Fecha_Llegada" class="form-label">Fecha de Llegada</label>
            <input type="date" class="form-control" id="Fecha_Llegada" name="Fecha_Llegada" required>
        </div>
        <div class="mb-3">
            <label for="Fecha_Salida" class="form-label">Fecha de Salida</label>
            <input type="date" class="form-control" id="Fecha_Salida" name="Fecha_Salida" required>
        </div>
        <div class="mb-3">
            <label for="hora_entra" class="form-label">Hora Estimada de Llegada</label>
            <input type="time" class="form-control" id="hora_entra" name="hora_entra">
        </div>
        <div class="mb-3">
            <label for="Adultos" class="form-label">Número de Adultos</label>
            <input type="number" class="form-control" id="Adultos" name="Adultos" min="1" required>
        </div>
        <div class="mb-3">
            <label for="Ninos" class="form-label">Número de Niños</label>
            <input type="number" class="form-control" id="Ninos" name="Ninos">
        </div>
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado de la Reserva</label>
            <select class="form-control" id="Estado" name="Estado">
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
                <option value="completada">Completada</option>
                <option value="en curso">En Curso</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Solicitudes" class="form-label">Solicitudes Especiales</label>
            <textarea class="form-control" id="Solicitudes" name="Solicitudes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fernando\Desktop\ProyectoPMS\laragon\www\roomeo\resources\views/reservas/create.blade.php ENDPATH**/ ?>