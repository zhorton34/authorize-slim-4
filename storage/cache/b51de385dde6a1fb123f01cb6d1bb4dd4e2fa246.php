<?php $__env->startSection('content'); ?>
    <div class="flex justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST" action="/register">
            <h1 class="text-2xl text-gray-600">Register</h1>
            <?php echo "<input type='hidden' value=csrf5e9644dec2dc3 name=csrf_name /> <input type='hidden' value=bb6a10d977cd3ca1a8931435d4bef843 name=csrf_value />"; ?>
            <input
                required
                type='text'
                name='first_name'
                placeholder='First Name'
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                required
                type='text'
                name='last_name'
                placeholder='Last Name'
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                required
                type="email"
                name="email"
                placeholder="Email Address"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                required
                type='password'
                name='password'
                placeholder="Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                required
                type='password'
                name='confirm_password'
                placeholder="Confirm Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <button type="submit" class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6">
                Register
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/register.blade.php ENDPATH**/ ?>