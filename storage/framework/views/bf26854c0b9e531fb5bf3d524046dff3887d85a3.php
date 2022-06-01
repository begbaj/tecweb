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
        <h4><strong>Informazione che possono interessarti...</strong></h4> 
        
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
                    Data Inizio Disponibilità: <?php echo e($alloggio->data_min); ?>

                    <br>
                    Data Fine Disponibilità: <?php echo e($alloggio->data_max); ?>

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
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/details.blade.php ENDPATH**/ ?>