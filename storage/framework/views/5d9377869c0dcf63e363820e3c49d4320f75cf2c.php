
<div class="card ms-2 me-2" style="width: 18rem;">
    <img src="<?php echo e(URL::asset('assets/' . $accomodation->id . '/thumbnail')); ?>" class="card-img-top" alt="Immagine Prova">
    <div class="card-body">
        <h5 class="card-title text-truncate"> <?php echo e($accomodation->titolo); ?></h5>
        <p class="card-text"> <?php echo e($accomodation->created_at); ?> </p>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('catalog')); ?>" class="btn btn-primary">Vedi dettagli</a>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/accomodationCard.blade.php ENDPATH**/ ?>