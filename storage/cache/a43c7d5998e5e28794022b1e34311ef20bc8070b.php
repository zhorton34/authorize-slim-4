<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sections.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="flex flex-wrap justify-center w-100 items-center">
        <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-1/2 p-4 w-3/5 mt-10">
            <h1 class="text-2xl text-gray-800 font-semibold">
                Reset Password Link Sent
            </h1>

            <hr>

            <h2 class="3xl mt-2">
                Link to reset your password successfully Sent, check your email for next steps!
            </h2>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/sent-reset-password-link-successfully.blade.php ENDPATH**/ ?>