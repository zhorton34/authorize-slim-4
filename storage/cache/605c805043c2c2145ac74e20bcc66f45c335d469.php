<?php $__env->startSection('content'); ?>
<div class="flex justify-center items-center">
    <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-5/6 p-4 mt-10">
        <h1 class="text-6xl text-gray-800 font-semibold">
            Home Dashboard!
        </h1>
        <h2 class="2xl">
            Welcome <?php echo e($user->first_name); ?>, <?php echo e($user->last_name); ?>

        </h2>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/dashboard/home.blade.php ENDPATH**/ ?>