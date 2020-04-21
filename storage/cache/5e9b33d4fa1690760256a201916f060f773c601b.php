<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sections.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="flex justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST" action="/reset-password/<?php echo e($key); ?>">
            <?php echo "<input type='hidden' name='csrf_value' value='bd1c87dbb3548d357c9c02ddfed0cbab' /> \n <input type='hidden' name='csrf_name' value='csrf5e9f6fbe8edcd' />"; app()->bind("old_input", session()->flash()->get("old")); ?>

            <input
                type="password"
                name="password"
                placeholder="New Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                type="password"
                name='confirm_password'
                placeholder="Confirm New Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <button type="submit" class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6">
                Reset Password
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/reset-password.blade.php ENDPATH**/ ?>