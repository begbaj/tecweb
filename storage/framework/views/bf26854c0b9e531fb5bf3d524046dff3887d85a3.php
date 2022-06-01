<?php $__env->startSection('title', 'Dettagli Annuncio'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3">
            <h4>Dettagli Annuncio</h4>    
        </div>
        <p class="lead"></p>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/details.blade.php ENDPATH**/ ?>