<?php $__env->startSection('title', 'Dettagli Annuncio'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3 pb-4">
            <h2><strong>Dettagli dell'Annuncio</strong></h2>    
        </div>
        <h6 class="lead"><strong><?php echo e($alloggio->titolo); ?></strong></h6>
    </div>
    
    <div class="container-fluid d-flex justify-content-center mt-4">
        <div class="border border-secondary pt-2 pb-2 ps-2 pe-2">
            <img src="<?php echo e(asset('assets/'. $alloggio->id . '/thumbnail')); ?>" style="width: 450px; height: 350px">
        </div>    
    </div>
    
    <div class="container-fluid border-top border-dark mt-5 pt-2">
        <div class="d-flex justify-content-center mt-2">
            <p class="lead"><?php echo e($alloggio->descrizione); ?></p>
        </div>
    </div>
    
    <div class="container-fluid border-top border-dark mt-2 pt-3">
        <h4><strong>Informazioni che possono interessarti...</strong></h4> 
        
        <div class="row d-flex align-items-center">
            <div class="d-flex row mt-4 align-items-center" style="width: 450px">
                <div class="col">
                    <img src="<?php echo e(asset('img/watch.svg')); ?>" style="width:35px; height: 35px">
                </div>
                <div class ="col-sm-10 lead">
                   Età minima consentita: <?php echo e($alloggio->eta_min); ?>

                   <br>
                   Età massima consentita: <?php echo e($alloggio->eta_max); ?>

                </div>
            </div>
            
            <div class="d-flex row mt-4 align-items-center ms-4" style="width: 450px">
                <div class="col">
                    <img src="<?php echo e(asset('img/gender-trans.svg')); ?>" style="width:35px; height: 35px">
                </div>
                <div class ="col-sm-10 lead">
                    Genere:
                    <?php if($alloggio->sesso == 'm'): ?> Maschio
                    <?php elseif($alloggio->sesso == 'f'): ?> Femmina 
                    <?php else: ?> Binario
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row d-flex align-items-center mt-3">
            <div class="d-flex row mt-4 align-items-center" style="width: 450px">
                <div class="col">
                    <img src="<?php echo e(asset('img/cash-stack.svg')); ?>" style="width:35px; height: 35px">
                </div>
                <div class="col-sm-10 lead">
                    Prezzo: <?php echo e(($alloggio->prezzo)); ?> €
                </div>
            </div>
            
            <div class="d-flex row mt-4 align-items-center ms-4" style="width:450px">
                <div class="col">
                    <img src="<?php echo e(asset('img/aspect-ratio.svg')); ?>" style="width: 35px; height: 35px">
                </div>
                <div class="col-sm-10 lead">
                    Dimensione Locale: <?php echo e($alloggio->superficie); ?> Mq.
                </div>
            </div>
        </div>
        
        <div class="row d-flex align-items-center mt-3">
            <div class="d-flex row mt-4 align-items-center" style="width: 450px">
                <div class="col">
                    <img src="<?php echo e(asset('img/calendar-range.svg')); ?>" style="width: 35px; height:35px"> 
                </div>
                <div class="col-sm-10 lead">
                    Data Inizio Disponibilità: <?php echo e(substr($alloggio->data_min, 0, -8)); ?>

                    <br>
                    Data Fine Disponibilità: <?php echo e(substr($alloggio->data_max, 0, -8)); ?>

                </div>
            </div>
            
            <div class="d-flex row mt-4 align-items-center ms-4" style="width: 450px">
                <div class="col">
                    <img src="<?php echo e(asset('img/house-door.svg')); ?>" style="width: 35px; height: 35px">
                </div>
                <div class="col-sm-10 lead">
                    Tipologia Alloggio:
                    <?php if($alloggio->tipo == 'posto_letto'): ?> Posto Letto
                    <?php else: ?> 
                    Appartamento 
                    <br>
                    N° Camere: <?php echo e($alloggio->camere); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="d-flex row mt-4 align-items-center">
            <div class="d-flex row align-items-center" style="width: 850px">
                <div class="col-sm-1" >
                    <img src="<?php echo e(asset('img/geo-alt.svg')); ?>" style="width: 35px; height: 35px">
                </div>
                <div class="col-sm-auto lead">
                    <div class="d-flex justify-content-start">
                    Provincia: <?php echo e($alloggio->provincia); ?>

                    <br>
                    Città: <?php echo e($alloggio->citta); ?>

                    <br>
                    Indirizzo: <?php echo e($alloggio->indirizzo); ?>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-flex row mt-5 align-items-center">
            <div class="d-flex row  align-items-center">
                <div class="col-sm-1">
                    <img src="<?php echo e(asset('img/building.svg')); ?>" style="width: 45px; height: 45px">
                </div>
                
                <div class="col-sm-2">
                    <h4><strong>Servizi</strong></h4> 
                </div>     
            </div>
            
            <div class="lead mt-3">
                <?php $__currentLoopData = $servizi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($servizio->id < 16): ?>
                    <div class="d-flex row align-items-center mt-2" style="width: 450px">
                        <div class="col-sm-1">
                            <img src="" style="width: 25px; height:25px">
                        </div>
                        
                        <div class="col-sm-auto lead ms-3">
                        <?php echo e(ucwords(str_replace("_", " ",$servizio->nome))); ?>    
                        </div>    
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
        </div>
        
        <div class="d-flex row align-items-center mt-5">
            <div class="col-sm-1">
                <img src="<?php echo e(asset('img/globe.svg')); ?>" style="width: 45px; height: 45px">
            </div>
                
            <div class="col-sm-2">
                <h4><strong>Vicino a...</strong></h4>
            </div>
                
            <div class="lead mt-3">
                <?php $__currentLoopData = $servizi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($servizio->id >= 16): ?>
                    <div class="d-flex row align-items-center mt-2" style="width: 450px">
                        <div class="col-sm-1">
                            <img src="" style="width: 25px; height: 25px">
                        </div>
                        
                        <div class="col-sm-auto lead ms-3">
                        <?php echo e(substr(ucwords(str_replace("_", " ", $servizio->nome)), 7)); ?>    
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php if(auth()->user()->hasRole('locatario')): ?>
    <div class="container d-flex justify-content-end mt-3">
        <a class="btn btn-primary me-2" href="">Invia Messaggio</a>
        <a class="btn btn-success me-2 ms-3" href="">Opziona l'Alloggio</a>
    </div>
    <div class="container d-flex mt-3 visually-hidden">
	<?php echo e(Form::open(array('route' => array(auth()->user()->hasRole('locatario') ? 'chatLocatario.send' : 'chatLocatore.send', 
		 $alloggio->id_locatore), 'id' => 'sendMessage', 'id_destinatario' => $alloggio->id_locatore,'files' => false, 'class'=> 'form-inline d-flex mt-2 w-100'))); ?>

		<?php echo e(Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1 w-100'])); ?>

		<?php echo e(Form::submit('Invia', ['class' => 'btn btn-primary m-1'])); ?>

        <?php echo e(Form::close()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/details.blade.php ENDPATH**/ ?>