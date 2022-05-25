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
    
    <div class="d-flex row border border-secondary rounded justify-content-start mt-3 ms-0" style="width: 35%">
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                <?php echo e(Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type'])); ?>

                <div class="d-flex col-7 ms-3">
                <?php echo e(Form::select('type', ['appartamento' => "Appartamento", 'posto-letto' => "Posto Letto"], old("type"), ['class' => 'form-control ms-4'])); ?>

                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                <?php echo e(Form::label('min-price', 'Prezzo Min', ['class' => 'col-sm-2 col-form-label', 'for' => 'min-price'])); ?>

                 <div class="d-flex col-7 ms-3">
                <?php echo e(Form::text('min-price', '', ['value' => old("min-price"), 'placeholder' => 'prezzo minimo', 'class' => 'form-control ms-4'])); ?>

                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-2 me-1">
                <?php echo e(Form::label('max-price', 'Prezzo Max', ['class' => 'col-sm-2 col-form-label', 'for' => 'max-price'])); ?>

                 <div class="d-flex col-7 ms-3">
                <?php echo e(Form::text('max-price', '', ['value' => old("max-price"), 'placeholder' => 'prezzo massimo', 'class' => 'form-control ms-4'])); ?>

                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                <?php echo e(Form::label('dimension', 'Dimensione', ['class' => 'col-sm-2 col-form-label', 'for' => 'dimension'])); ?>

                 <div class="d-flex col-7 ms-3">
                <?php echo e(Form::text('dimension', '', ['value' => old("dimension"), 'placeholder' => 'dimensione', 'class' => 'form-control ms-4'])); ?>

                </div>
            </div>
        </div>
        
        <div class="container">
            <div  class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                <?php echo e(Form::label('n-rooms', 'Numero Camere', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-rooms'])); ?>

                <div class="d-flex col-7 ms-3">
                <?php echo e(Form::number('n-rooms', '0', ['value'=> old("n-rooms"), 'class' => 'form-control ms-4'])); ?>   
                </div>
            </div>
        </div>
        
        <div class="container">
            <div  class="form-outline d-flex row align-items-center justify-content-center pt-2 pb-2 me-1">
                <?php echo e(Form::label('n-beds', 'Posti Letto', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-beds'])); ?>

                <div class="d-flex col-7 ms-3">
                <?php echo e(Form::number('n-beds', '0', ['value'=> old("n-beds"), 'class' => 'form-control ms-4'])); ?>   
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex row border border-secondary rounded justify-content-start mt-3 ms-0" style="width: 35%">
        <div class="d-flex row justify-content-center">
            <?php echo e(Form::checkbox('name', 'value', null)); ?>

            <?php echo e(Form::checkbox('cucina', 'Cucina')); ?>

            <?php echo e(Form::checkbox('cucina', 'Cucina')); ?>

        </div> 
    </div>    
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.locatario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatario.blade.php ENDPATH**/ ?>