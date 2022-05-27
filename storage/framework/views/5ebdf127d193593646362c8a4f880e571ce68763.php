<?php $__env->startSection('title', 'Area Locatore'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('components.miniCatalog', ['accoms' => $accoms], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.locatore', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatore.blade.php ENDPATH**/ ?>