<?php $__env->startSection('content'); ?>
    <div class="flex flex-wrap justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST" action="/login">
            <?php echo "<input type='hidden' name='csrf_value' value='de06078cce939fb01f456fcf43d5d2b2' /> \n <input type='hidden' name='csrf_name' value='csrf5e9f990553280' />"; app()->bind("old_input", session()->flash()->get("old")); ?>

            <input
                name="email"
                value="<?php echo e(old('email')); ?>"
                placeholder="Email Address"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                name='password'
                placeholder="Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <button type="submit" class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6">
                Login
            </button>

            <div class="flex justify-end mt-4 text-gray-500 w-full">
                <a href="/reset-password">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/login.blade.php ENDPATH**/ ?>