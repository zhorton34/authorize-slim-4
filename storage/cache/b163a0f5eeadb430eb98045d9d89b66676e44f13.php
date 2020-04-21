<nav class="inset-x-0 top-0 h-20 flex items-center justify-between fixed-top">
    <div class="flex justify-around items-center">
        <?php echo $__env->make('sections.navigation.top-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex justify-end items-center">
        <?php echo $__env->make('sections.navigation.top-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</nav>
<?php /**PATH /home/vagrant/code/resources/views/sections/navigation/top.blade.php ENDPATH**/ ?>