<div class="card m-2 shadow-sm hover-overlay" data-mdb-ripple-color="light">
<?php if(auth()->user()->hasRole('locatario')): ?>
<a class="card-block stretched-link text-decoration-none" href="<?php echo e(route('chatLocatario', [$user->id])); ?>">
<?php elseif(auth()->user()->hasRole('locatore')): ?>
<a class="card-block stretched-link text-decoration-none" href="<?php echo e(route('chatLocatore', [$user->id])); ?>">
<?php endif; ?>
  <div class="card-body hover-overlay" data-mdb-ripple-color="light">
        <h5 class="card-title text-truncate"><?php echo e($user->nome." ".$user->cognome); ?></h5>
        <p class="card-text text-muted"><small><?php echo e($user->max); ?></small></p>
    </div>
<div class="card-footer text-center p-0">
<?php if(auth()->user()->hasRole('locatario')): ?>
<a class="btn btn-primary btn-block w-100" href="<?php echo e(route('chatLocatario', [$user->id])); ?>">Vedi chat</a>
<?php elseif(auth()->user()->hasRole('locatore')): ?>
<a class="btn btn-primary btn-block w-100" href="<?php echo e(route('chatLocatore', [$user->id])); ?>">Vedi chat</a>
<?php endif; ?>
</div>
</a>
</div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/rubricCard.blade.php ENDPATH**/ ?>