
<div class="card m-2 shadow-sm">
    <img class="card-img-top" style="height: 300px" src="<?php echo e(asset('assets/'. $accomodation->id . '/thumbnail')); ?> ">
    <div class="card-body">
        <h5 class="card-title text-truncate"><?php echo e($accomodation->titolo); ?></h5>
        <p class="card-text"> <?php echo e($accomodation->descrizione); ?> </p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <?php if(Auth::check() && auth()->user()->hasRole('locatario')): ?>
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo e(route('detailsLocatario', [$accomodation->id])); ?>"> Vedi dettagli</a>
            </div>
        <?php elseif(Auth::check() && auth()->user()->hasRole('locatore')): ?>
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo e(route('detailsLocatore', [$accomodation->id])); ?>"> Vedi dettagli</a>
            </div>
                
        <?php else: ?>    
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo e(route('login')); ?>"> Vedi dettagli </a>
            </div>
        <?php endif; ?>
            <small class="text-muted"><?php echo e($accomodation->created_at); ?></small>
    </div>
  </div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/card.blade.php ENDPATH**/ ?>