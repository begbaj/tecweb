<?php $__env->startPush('head'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Catalogo'); ?>

<?php $__env->startSection('content'); ?> 
<section class="py-5 container">
<div class="row py-lg-5">
 <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
<?php if(auth()->guard()->guest()): ?>
<p class="lead text-muted text-center"> <a id="registrazione" href="<?php echo e(route('register')); ?>"> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
<?php endif; ?>
</div>
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

<div class="container d-flex justify-content-center mt-5">
	<?php echo e($accomodations->onEachSide(2)->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/public/catalog.blade.php ENDPATH**/ ?>