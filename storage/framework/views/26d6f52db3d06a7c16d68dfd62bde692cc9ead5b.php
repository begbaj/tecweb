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
        <?php echo e(Form::submit("Salva", ['class' => 'btn btn-primary'])); ?>

        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
      </div>
    </div>
  </div>
</div>
<?php echo e(Form::close()); ?>



<br>
<hr>
<?php if(isset($faq)): ?>
<?php $count=0; ?>
<?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary">Modifica</button>
    <button type="button" class="btn btn-danger">Elimina</button>
</div>
<br>
<div class="container text-center">
<p class= "text-dark"> <?php echo ++$count; ?> <?php echo e($faq->domanda); ?> </p>
<p class="text-secondary"><?php echo e($faq->risposta); ?> </p>
</div>
<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/admfaqs.blade.php ENDPATH**/ ?>