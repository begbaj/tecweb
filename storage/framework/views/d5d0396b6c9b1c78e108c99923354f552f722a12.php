<?php $__env->startSection('title', 'Catalogo'); ?>

<?php $__env->startSection('content'); ?> 
  <section class="py-5 container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
        <?php if(!auth()->user('admin')): ?>
        <p class="lead text-muted text-center"> <a id="registrazione" href="#"> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
        <?php endif; ?>
      </div>
    </div>

<?php echo e(Form::open(array('id' => 'filter-form', 'files' => false ))); ?>

    <div class='d-flex justify-content-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-items-center mt-5 pe-5">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                <?php echo e(Form::label('location', 'Località', ['class' => 'col-sm-2 col-form-label', 'for' => 'location'])); ?>

                <div class="col-sm-10 ps-3">
                <?php echo e(Form::text('location', '', ['value' => old("location"), 'placeholder'=> 'Località', 'class' => 'form-control ms-4'])); ?>

                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <?php echo e(Form::label('start-date', 'Inizio', ['class' => 'col-sm-2 col-form-label', 'for' => 'start-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('start-date', \Carbon\Carbon::now(), ['value' => old('start-date'), 'class' => 'form-control ms-4'])); ?>

                </div>
            </div>

            <div class="form-outline row ms-5 mb-4 mt-4 pe-3 w-25">
                <?php echo e(Form::label('end-date', 'Fine', ['class' => 'col-sm-2 col-form-label', 'for' => 'end-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('end-date', \Carbon\Carbon::now(), ['value' => old('end-date'), 'class' => 'form-control ms-4'])); ?>

                </div>
            </div>
            
            <div class="text-center col pt-2 ps-4">
                <?php echo e(Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2'])); ?>

            </div>
        </div>
    </div>
</section> 
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php $__currentLoopData = $accomodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                <?php echo $__env->make('components.card', [ 'accomodation' => $accomodation ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
    </div>
</div>

<div class="py-5 text-center container">  
   <a href="<?php echo e(route('login')); ?>"> Altri Risultati </a>
</div>

<?php $__env->stopSection(); ?>
<!--    
<!-- Extra JavaScript/CSS added manually in "Settings" tab
<!-- Include jQuery 
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
-->

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/public/catalog.blade.php ENDPATH**/ ?>