<?php $__env->startSection('content'); ?>
    <div>
        Home Page <?php echo e(env('NON_EXISTING_ENV_VALUE', 'Value Default To Me!!')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zhorton/tutorials/authorize-slim-4/resources/views/auth/home.blade.php ENDPATH**/ ?>