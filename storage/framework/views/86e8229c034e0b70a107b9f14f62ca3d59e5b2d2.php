<?php $__env->startSection('title', 'Area Locatario'); ?>

<?php $__env->startSection('content'); ?>

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
    
    <div class="container">
        <div class="d-flex justify-content-center border border-secondary mt-3 pb-2 rounded row">
            <div class="d-flex row mt-3" style="width: 350px">
                <div class="container">
                    <div class="form-outline d-flex row align-items-center justify-content-center pt-1">
                        <?php echo e(Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type'])); ?>

                        <div class="d-flex col-7 ms-3">
                        <?php echo e(Form::select('type', ['appartamento' => "Appartamento", 'posto-letto' => "Posto Letto"], old("type"), ['class' => 'form-control ms-4'])); ?>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="form-outline d-flex row align-items-center justify-content-center pt-2 ">
                        <?php echo e(Form::label('min-price', 'Prezzo Min', ['class' => 'col-sm-2 col-form-label', 'for' => 'min-price'])); ?>

                         <div class="d-flex col-7 ms-3">
                        <?php echo e(Form::text('min-price', '', ['value' => old("min-price"), 'placeholder' => 'prezzo minimo', 'class' => 'form-control ms-4'])); ?>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="form-outline d-flex row align-items-center justify-content-center pt-0 ">
                        <?php echo e(Form::label('max-price', 'Prezzo Max', ['class' => 'col-sm-2 col-form-label', 'for' => 'max-price'])); ?>

                         <div class="d-flex col-7 ms-3">
                        <?php echo e(Form::text('max-price', '', ['value' => old("max-price"), 'placeholder' => 'prezzo massimo', 'class' => 'form-control ms-4'])); ?>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="form-outline d-flex row align-items-center justify-content-center pt-2 ">
                        <?php echo e(Form::label('dimension', 'Dimensione', ['class' => 'col-sm-2 col-form-label', 'for' => 'dimension'])); ?>

                         <div class="d-flex col-7 ms-3">
                        <?php echo e(Form::text('dimension', '', ['value' => old("dimension"), 'placeholder' => 'dimensione', 'class' => 'form-control ms-4'])); ?>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div  class="form-outline d-flex row align-items-center justify-content-center pt-2 ">
                        <?php echo e(Form::label('n-rooms', 'Numero Camere', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-rooms'])); ?>

                        <div class="d-flex col-7 ms-3">
                        <?php echo e(Form::number('n-rooms', '0', ['value'=> old("n-rooms"), 'class' => 'form-control ms-4'])); ?>   
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div  class="form-outline d-flex row align-items-center justify-content-center pt-0 pb-2 ">
                        <?php echo e(Form::label('n-beds', 'Posti Letto', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-beds'])); ?>

                        <div class="d-flex col-7 ms-3">
                        <?php echo e(Form::number('n-beds', '0', ['value'=> old("n-beds"), 'class' => 'form-control ms-4'])); ?>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex row mt-3" style="width: 350px; height: 250px">
                <div class="text-center pt-2">
                    <h5>Servizi</h5>
                </div>

                <div class ="form-outline d-flex align-items-center me-1 mb-3">
                    <div class="row ms-2">
                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('cucina', 'Cucina', null)); ?>

                        <?php echo e(Form::label('cucina', 'Cucina', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'cucina'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('locale-ricreativo', 'Locale Ricreativo', null)); ?>

                        <?php echo e(Form::label('locale-ricreativo', 'Locale Ricreativo', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'locale-ricreativo'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('box-doccia', 'Box Doccia', null)); ?>

                        <?php echo e(Form::label('box-doccia', 'Box Doccia', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'box-doccia'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('condizionatore', 'Condizionatore', null)); ?>

                        <?php echo e(Form::label('condizionatore', 'Condizionatore', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'condizionatore'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('asciugatrice', 'Asciugatrice', null)); ?>

                        <?php echo e(Form::label('asciugatrice', 'Asciugatrice', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'asciugatrice'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('fumatori', 'Fumatori', null)); ?>

                        <?php echo e(Form::label('fumatori', 'Fumatori', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'fumatori'])); ?>

                        </div>   
                    </div>

                    <div class="row ps-4">
                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('angolo-studio', 'Angolo Studio', null)); ?>

                        <?php echo e(Form::label('angolo-studio', 'Angolo Studio', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'angolo-studio'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('vasca', 'Vasca', null)); ?>

                        <?php echo e(Form::label('vasca', 'Vasca', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'vasca'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('wifi', 'WiFi', null)); ?>

                        <?php echo e(Form::label('wifi', 'WiFi', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'wifi'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('lavatrice', 'Lavatrice', null)); ?>

                        <?php echo e(Form::label('lavatrice', 'Lavatrice', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'lavatrice'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('riscaldamento', 'Riscaldamento', null)); ?>

                        <?php echo e(Form::label('riscaldamento', 'Riscaldamento', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'riscaldamento'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('tv', 'TV', null)); ?>

                        <?php echo e(Form::label('tv', 'TV', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'tv'])); ?>

                        </div>   
                    </div>
                </div>
            </div>

            <div class="d-flex row mt-3 ms-3" style="width: 350px; height: 250px">
                <div class="text-center pt-2">
                    <h5>Vicino a...</h5>
                </div>

                <div class="form-outline d-flex align-items-center me-1 mb-3">
                    <div class="row ms-2">
                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('facoltà', 'Facoltà', null)); ?>

                        <?php echo e(Form::label('facoltà', 'Facoltà', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'facoltà'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('supermercato', 'Supermercato', null)); ?>

                        <?php echo e(Form::label('supermercato', 'Supermercato', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'supermercato'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('fermata-metro', 'Fermata Metro', null)); ?>

                        <?php echo e(Form::label('fermata-metro', 'Fermata Metro', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'fermata-metro'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('centro-città', 'Centro Città', null)); ?>

                        <?php echo e(Form::label('centro-città', 'Centro Città', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'centro-città'])); ?>

                        </div>
                    </div>

                    <div class="row ms-4">
                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('mensa', 'Mensa', null)); ?>

                        <?php echo e(Form::label('mensa', 'Mensa', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'mensa'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('stazione', 'Stazione', null)); ?>

                        <?php echo e(Form::label('stazione', 'Stazione', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'stazione'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('fermata-bus', 'Fermata Bus', null)); ?>

                        <?php echo e(Form::label('fermata-bus', 'Fermata Bus', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'fermata-bus'])); ?>

                        </div>

                        <div class="d-flex align-items-center pt-1">
                        <?php echo e(Form::checkbox('palestra', 'Palestra', null)); ?>

                        <?php echo e(Form::label('palestra', 'Palestra', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'palestra'])); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid col pt-2">
        <?php $__currentLoopData = $accomodations->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-group">
                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <?php echo $__env->make('components.card', [ 'accomodation' => $accomodation ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="container d-flex justify-content-center mt-3">
            <?php echo e($accomodations->onEachSide(2)->links()); ?>

            </div>
        </div>

        
    </div>
    <?php echo e(Form::close()); ?> 
    
   
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.locatario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatario.blade.php ENDPATH**/ ?>