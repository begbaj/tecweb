<?php $__env->startSection('title', 'Area Amministratore'); ?>

<?php $__env->startSection('content'); ?>
<div class="static text-center">
    <p>Benvenuto <?php echo e(Auth::user()->username); ?>!</p>
</div>
<div class="container py-2 bg-light">
    <div class="row overflow-hidden d-flex flex-row flex-nowrap">
    <?php if(isset($accomodations)): ?>
        <?php $__currentLoopData = $accomodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('components/accomodationCard', [ 'accomodations' => $accomodation ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/admin.blade.php ENDPATH**/ ?>