<div class="col">
  <div class="card shadow-sm">
    <img class="card-img-top" src="<?php echo e(URL::asset('assets/' . $accomodation->id . '/1.jpg')); ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo e($accomodation->titolo); ?></h5>
        <p class="card-text"> <?php echo e($accomodation->descrizione); ?> </p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo e(route('login')); ?>"> Vedi dettagli </a>
            </div>
            <small class="text-muted"><?php echo e($accomodation->created_at); ?></small>
        </div>
    </div>
  </div>
</div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/card.blade.php ENDPATH**/ ?>