<?php $__env->startSection('title', 'Catalogo'); ?>

<?php $__env->startSection('content'); ?> 
<section class="py-5 container">
<?php if(!auth()->user('admin')&&!auth()->user('locatore')&&!auth()->user('locatario')): ?>
<div class="row py-lg-5">
 <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
<p class="lead text-muted text-center"> <a id="registrazione" href="<?php echo e(route('register')); ?>"> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
 </div>
</div>

<?php echo e(Form::open(array('id' => 'filter-form', 'files' => false ))); ?>

 <?php echo e(Form::open(array('id' => 'filter-form', 'files' => false ))); ?>

    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                <?php echo e(Form::label('location', 'Località', ['class' => 'col-sm-2 col-form-label', 'for' => 'location'])); ?>

                <div class="col-sm-10 ps-3">
                <?php echo e(Form::text('location', '', ['value' => old("location"), 'placeholder'=> 'Località', 'class' => 'form-control ms-5'])); ?>

                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <?php echo e(Form::label('start-date', 'Inizio', ['class' => 'col-sm-3 col-form-label', 'for' => 'start-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('start-date', \Carbon\Carbon::now(), ['value' => old('start-date'), 'class' => 'form-control ms-6'])); ?>

                </div>
            </div>

            <div class="form-outline row ms-3 mb-4 mt-4 w-25">
                <?php echo e(Form::label('end-date', 'Fine', ['class' => 'col-sm-3 col-form-label', 'for' => 'end-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('end-date', \Carbon\Carbon::now(), ['value' => old('end-date'), 'class' => 'form-control ms-6'])); ?>

                </div>
            </div>
            <div class="text-center col pt-2 ps-4">
                <?php echo e(Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2 ms-5'])); ?>

            </div>
        </div>
    </div>       
 <?php endif; ?>

<?php if(auth()->user('admin')): ?>
<?php echo e(Form::open(array('route' => 'stats', 'id' => 'filter-form', 'files' => false, 'method'=>'GET' ))); ?>

    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                <?php echo e(Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type'])); ?>

                <div class="col-sm-10 ps-3">
                <?php echo e(Form::select('type', ['appartamento' => "appartamento", 'posto-letto' => "posto letto"], old("type"), ['class' => 'form-control ms-5'])); ?>

                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <?php echo e(Form::label('start-date', 'Inizio', ['class' => 'col-sm-3 col-form-label', 'for' => 'start-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('start-date', \Carbon\Carbon::now(), ['value' => old('start-date'), 'class' => 'form-control ms-6'])); ?>

                </div>
            </div>

            <div class="form-outline row ms-3 mb-4 mt-4 w-25">
                <?php echo e(Form::label('end-date', 'Fine', ['class' => 'col-sm-3 col-form-label', 'for' => 'end-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('end-date', \Carbon\Carbon::now(), ['value' => old('end-date'), 'class' => 'form-control ms-6'])); ?>

                </div>
            </div>
            <div class="text-center col pt-2 ps-4">
                <?php echo e(Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2 ms-5'])); ?>

            </div>
        </div>
    </div> 
    <?php echo e(Form::close()); ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php $__currentLoopData = $accomodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                <?php echo $__env->make('components.card', [ 'accomodation' => $accomodation ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
<?php endif; ?>
  
    
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

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/public/catalog.blade.php ENDPATH**/ ?>