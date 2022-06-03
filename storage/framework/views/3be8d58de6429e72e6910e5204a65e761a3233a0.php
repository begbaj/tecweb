<?php $__env->startSection('title', 'Gestione FAQs'); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(function(){
    $("#domanda").on('input', function (event){
        if ($("#domanda").val() == '' || $("#risposta").val() == ''){
            $("#save-btn").prop('disabled', true);
        } else {
            $("#save-btn").prop('disabled', false);
        }
    });
    $("#risposta").on('input', function (event){
        if ($("#domanda").val() == '' || $("#risposta").val() == ''){
            $("#save-btn").prop('disabled', true);
        } else {
            $("#save-btn").prop('disabled', false);
        }
    });
    $("#risposta").trigger('input');
    $("#domanda").trigger('input');
    
    
    $("#editeddomanda").on('input', function (event){
        if ($("#editeddomanda").val() == '' || $("#editedrisposta").val() == ''){
            $("#modify-btn").prop('disabled', true);
        } else {
            $("#modify-btn").prop('disabled', false);
        }
    });
    $("#editedrisposta").on('input', function (event){
        if ($("#editeddomanda").val() == '' || $("#editedrisposta").val() == ''){
            $("#modify-btn").prop('disabled', true);
        } else {
            $("#modify-btn").prop('disabled', false);
        }
    });
    $("#editedrisposta").trigger('input');
    $("#editeddomanda").trigger('input');
    
});
</script>
<?php $__env->stopSection(); ?>


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

<?php echo e(Form::token()); ?>

<div class='col'>
    <div class="col mb-3">
        <?php echo e(Form::label('domanda', 'Domanda', ['class' => 'col-sm-2 col-form-label',  'for'=>'domanda'])); ?>

        <?php echo e(Form::text('domanda', '', ['id'=>"domanda", 'class' => 'form-control'] )); ?>

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

        <?php echo e(Form::text('risposta', '', ['id'=>'risposta', 'class' => 'form-control'] )); ?>

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
        <?php echo e(Form::submit("Salva", ["id"=> 'save-btn','class' => 'btn btn-primary'])); ?>

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
<?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifica-<?php echo e($fq->id); ?>"">Modifica</button>
    <div class="modal fade" id="modifica-<?php echo e($fq->id); ?>" tabindex="-1" aria-labelledby="#EditModal" aria-hidden="true">
          
        
<div class="modal-dialog">
    <div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="EditModal">Modifica FAQ</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
 <div class="modal-body">
<?php echo e(Form::open(array('route' => ['admin.faq.edit', $fq->id]))); ?>

<?php echo e(Form::token()); ?>

<div class='col'>
    <div class="col mb-3">
        <?php echo e(Form::label('domanda', 'Domanda', ['class' => 'col-sm-2 col-form-label',  'for'=>'domanda'])); ?>

        <?php echo e(Form::text('domanda', $fq->domanda, ['id'=>"editeddomanda", 'class' => 'form-control'] )); ?>

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

        <?php echo e(Form::text('risposta', $fq->risposta, ['id'=>"editedrisposta", 'class' => 'form-control'] )); ?>

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
        <?php echo e(Form::submit("Salva", ["id"=> 'modify-btn','class' => 'btn btn-primary'])); ?>

        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>        
        
        
    </div>
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