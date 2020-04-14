<?php $__env->startSection('content'); ?>
    <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-1/2 p-4 mt-10">
        <h1 class="text-6xl text-gray-800 font-semibold">
            Slim 4
        </h1>
        <?php echo "<input type='hidden' value=csrf5e964451aab6e name=csrf_name /> <input type='hidden' value=7fc2cd111768c4ebff902b642762fea3 name=csrf_value />"; ?>
        <h2 class="2xl">
            Welcome to our slim 4 Authentication Tutorial!
        </h2>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/welcome.blade.php ENDPATH**/ ?>