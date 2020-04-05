<?php $__env->startSection('content'); ?>
    <div>
        Welcome Home <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

        <small>
            (<?php echo e($user->email); ?>)
        </small>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/home.blade.php ENDPATH**/ ?>