

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalle del Cliente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($cliente->Nombre); ?> <?php echo e($cliente->Apellidos); ?></h5>
            <p class="card-text"><strong>DNI:</strong> <?php echo e($cliente->DNI); ?></p>
            <p class="card-text"><strong>Nacionalidad:</strong> <?php echo e($cliente->Nacionalidad); ?></p>
            <p class="card-text"><strong>Teléfono:</strong> <?php echo e($cliente->Telefono); ?></p>
            <p class="card-text"><strong>Fecha de Nacimiento:</strong> <?php echo e(\Carbon\Carbon::parse($cliente->Fecha_nacimiento)->format('d/m/Y')); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo e($cliente->Email); ?></p>
            <p class="card-text"><strong>Dirección:</strong> <?php echo e($cliente->Direccion); ?></p>
            <p class="card-text"><strong>Código Postal:</strong> <?php echo e($cliente->Codigo_Postal); ?></p>
            <p class="card-text"><strong>Ciudad:</strong> <?php echo e($cliente->Ciudad); ?></p>
            <p class="card-text"><strong>País:</strong> <?php echo e($cliente->Pais); ?></p>
            <p class="card-text"><strong>Tarjeta de Crédito:</strong> <?php echo e($cliente->Tarjeta_Cred); ?></p>
            <a href="<?php echo e(route('clientes.edit', $cliente->ID_Cliente)); ?>" class="btn btn-primary">Editar</a>
            <form action="<?php echo e(route('clientes.destroy', $cliente->ID_Cliente)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este cliente?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProyectoFCT\laragon\www\roomeo\resources\views/clientes/show.blade.php ENDPATH**/ ?>