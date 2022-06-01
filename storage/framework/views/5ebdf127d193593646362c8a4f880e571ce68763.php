<?php $__env->startSection('title', 'Area Locatore'); ?>

<?php $__env->startSection('content'); ?>
<h1> I tuoi annunci </h1>
    <?php if(!isset($accoms) || count($accoms) < 1): ?>
        <p> Non hai ancora creato nessun annuncio! Fallo ora <a href="<?php echo e(route('newaccom')); ?>"> + </a> </p>
    <?php else: ?>
        <?php echo $__env->make('components.miniCatalog', ['accoms' => $accoms], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.locatore', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatore.blade.php ENDPATH**/ ?>