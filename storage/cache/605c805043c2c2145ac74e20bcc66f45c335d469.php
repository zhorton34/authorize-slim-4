<?php $__env->startSection('content'); ?>
    <div class="flex justify-center">
        <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-4/5 p-4 mt-10">
            <h1 class="text-4xl text-gray-800 font-semibold">
                Home Dashboard
            </h1>
            <hr>
            <h2 class="2xl mt-6">
                <?php echo e(Auth::user()->email); ?> (<?php echo e(Auth::user()->first_name); ?>, <?php echo e(Auth::user()->last_name); ?>)
            </h2>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/dashboard/home.blade.php ENDPATH**/ ?>