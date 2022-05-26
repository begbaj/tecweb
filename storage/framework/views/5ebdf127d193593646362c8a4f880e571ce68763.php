<?php $__env->startSection('title', 'Area Locatore'); ?>

<?php $__env->startSection('content'); ?>
<div class="static">
    <p>Area Locatore</p>
    <p>Benvenuto <?php echo e(Auth::user()->nome); ?> <?php echo e(Auth::user()->cognome); ?></p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.locatore', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatore.blade.php ENDPATH**/ ?>