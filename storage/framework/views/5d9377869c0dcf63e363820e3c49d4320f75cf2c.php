
<div class="card ms-2 me-2" style="width: 18rem;">
    <img src="img/test-loQ.jpg" class="card-img-top" alt="Immagine Prova">
    <div class="card-body">
        <h5 class="card-title"> <?php echo e($accomodation->titolo); ?></h5>
        <p class="card-text"> <?php echo e($accomodation->desc); ?> </p>
        <a href="<?php echo e(route('catalog')); ?>" class="btn btn-primary">Vedi dettagli</a>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/accomodationCard.blade.php ENDPATH**/ ?>