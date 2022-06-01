<?php $__env->startSection('title', 'Area Amministratore'); ?>

<?php $__env->startSection('content'); ?>
<div class="static text-center">
    <p>Benvenuto <?php echo e(Auth::user()->username); ?>!</p>
</div>
<div class="container-fluid">
<?php $__currentLoopData = $accomodations->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="card-group">
            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                <?php echo $__env->make('components.card', [ 'accomodation' => $accomodation ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/admin.blade.php ENDPATH**/ ?>