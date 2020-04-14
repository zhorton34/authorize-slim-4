<?php $__env->startSection('content'); ?>
   <div class="flex justify-center">
      <form class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST">
         <h1 class="text-2xl text-gray-600">Register</h1>

         <input
              type="text"
              name="first_name"
              class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
              placeholder="First Name"
              required
         />

         <input
              type="text"
              name="last_name"
              class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
              placeholder="Last Name"
              required
         />

         <input
           type="email"
           name="email"
           class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
           placeholder="Email Address"
           required
         />

         <input
            type="password"
            name="password"
            class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
            placeholder="Password"
            required
         />

         <input
            type="password"
            name="confirm_password"
            class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
            placeholder="Confirm Password"
            required
         />

         <button class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6" type="submit">
            Register
         </button>
      </form>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/register.blade.php ENDPATH**/ ?>