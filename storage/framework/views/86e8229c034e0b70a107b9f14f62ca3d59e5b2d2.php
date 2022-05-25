<?php $__env->startSection('title', 'Area Locatario'); ?>

<?php $__env->startSection('content'); ?>
<!-- <div class="static">
    <p>Area Locatario</p>
    <p>Benvenuto <?php echo e(Auth::user()->nome); ?> <?php echo e(Auth::user()->cognome); ?></p>
</div> -->

<section class="py-4 container-fluid ">
    <div class="text-center mb-3">
        <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
    </div>
    <div class="text-center">
        <h4>Benvenuto <?php echo e(Auth::user()->nome); ?> <?php echo e(Auth::user()->cognome); ?> nella tua area personale!</h4>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.locatario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatario.blade.php ENDPATH**/ ?>