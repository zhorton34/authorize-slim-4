<?php $__env->startSection('content'); ?>
    <div>
        Name: <?php echo e($name); ?> <small>(id <?php echo e($id); ?>)</small>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zhorton/tutorials/authorize-slim-4/resources/views/auth/home.blade.php ENDPATH**/ ?>