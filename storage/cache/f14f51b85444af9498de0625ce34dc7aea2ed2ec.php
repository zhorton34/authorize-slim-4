<?php $__env->startSection('content'); ?>
    <div>
        Home Page

        <?php echo e($team->name); ?>

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <pre>
                <?php echo e($user->name); ?> <?php echo e($user->email); ?> <?php echo e($user->password); ?>

            </pre>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/home.blade.php ENDPATH**/ ?>