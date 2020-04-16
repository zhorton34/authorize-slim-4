<?php if(session()->flash()->has('errors')): ?>
    <div class="flex justify-center w-full">
        <div class="bg-red-500 w-1/2 shadow-md hover:shadow-xl rounded-lg p-2 mt-10 flex flex-wrap self-center justify-center items-center">
            <?php $__currentLoopData = session()->flash()->get('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-full flex justify-start items-center p-2 text-white">
                    <alert-circle-icon></alert-circle-icon>

                    <div class="ml-4">
                        <?php echo e($message); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/vagrant/code/resources/views/sections/errors.blade.php ENDPATH**/ ?>