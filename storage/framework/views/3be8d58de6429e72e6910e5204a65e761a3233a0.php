<?php $__env->startSection('title', 'Gestione FAQs'); ?>

<?php $__env->startSection('content'); ?>
<div class="static">
<br><center><h1>FAQ</h1></center><br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Aggiungi</button>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Aggiungi FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
<?php echo e(Form::open(['route' => 'admin.faq.add'])); ?>

<div class='col'>
    <div class="col mb-3">
        <?php echo e(Form::label('domanda', 'Domanda', ['class' => 'col-sm-2 col-form-label',  'for'=>'domanda'])); ?>

        <?php echo e(Form::text('domanda', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('domanda')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('domanda'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>
    <div class="col mb-3">
        <?php echo e(Form::label('risposta', 'Risposta', ['class' => 'col-sm-2 col-form-label',  'for'=>'risposta'])); ?>

        <?php echo e(Form::text('risposta', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('risposta')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('risposta'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>
</div>
</div>       
      <div class="modal-footer">
        <script> myFunc(){staticBackdrop.show();} </script>
        <?php echo e(Form::submit("Salva", ['class' => 'btn btn-primary onclick = "myFunc()"'])); ?>


        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
      </div>
    </div>
  </div>
</div>
<?php echo e(Form::close()); ?>

<button type="button" class="btn btn-primary" data-bs-toggle="popover" title="Popover Header" data-bs-content="Some content inside the popover">
    Toggle popover
  </button>
</div>

<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>

<br>
<hr>
<?php if(isset($faq)): ?>
<?php $count=0; ?>
<?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary">Modifica</button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-<?php echo e($fq->id); ?>">Elimina</button>
    <div class="modal fade" id="delete-<?php echo e($fq->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Elimina FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confermi di voler procedere con l'eliminazione?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <a type="button" href='<?php echo e(route("admin.faq.remove", ["id" => $fq->id])); ?>' class="btn btn-primary">Confermo</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container text-center">
    <p class="text-dark"> <?php echo ++$count; ?> <?php echo e($fq->domanda); ?> </p>
    <p class="text-secondary"><?php echo e($fq->risposta); ?> </p>
</div>
<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tecweb/resources/views/admin/admfaqs.blade.php ENDPATH**/ ?>