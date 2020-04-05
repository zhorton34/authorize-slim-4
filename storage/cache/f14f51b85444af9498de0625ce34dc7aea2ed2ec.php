<?php $__env->startSection('content'); ?>
    <div>
        <?php echo e(\Illuminate\Support\Str::plural($name)); ?> Home Page
        <pre>
            <?php echo e($user); ?>

        </pre>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/home.blade.php ENDPATH**/ ?>