<div class='container'>
    <?php if(isset($accoms)): ?>
        <?php $__currentLoopData = $accoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <?php echo $__env->make('components.longcard', ['accomodation' => $accom], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/miniCatalog.blade.php ENDPATH**/ ?>