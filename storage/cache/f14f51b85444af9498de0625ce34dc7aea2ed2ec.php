<?php $__env->startSection('content'); ?>
    <div>
        Home Page

        <?php if($user->actingAs('Admin', 'SuperAdmin')): ?>
        <pre>
            <?php echo e($user->name); ?> <?php echo e($user->email); ?> <?php echo e($user->password); ?>

        </pre>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/home.blade.php ENDPATH**/ ?>