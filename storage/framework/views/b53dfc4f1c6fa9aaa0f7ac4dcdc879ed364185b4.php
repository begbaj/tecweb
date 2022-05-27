<?php $__env->startSection('title', 'Area Profilo Personale'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3">
            <h4>Area Profilo Utente</h4>  
        </div>
        <div class="container  lead">
            <p> In questa area puoi visualizzare e modificare i tuoi dati personali</p>
        </div> 
    </div>
      
    <div class="container mt-4 ps-4">
        <h6>Foto Profilo</h6>
    </div>
        
    <div class="d-flex justify-content-start mt-2">
       <div class="d-flex ps-4">
            <div class="container d-flex justify-content-center align-items-center border rounded border-secondary" style="width: 175px; height: 200px">
                <?php if(Auth::user()->genere = 'maschio'): ?>
                <img src="<?php echo e(URL::asset('img/male_icon.png')); ?>" height="190" width="165">
                <?php elseif(Auth::user()->genere = 'femmina'): ?>
                <img src="<?php echo e(URL::asset('img/female_icon.jpg')); ?>" height="190" width="165">
                <?php endif; ?>
            </div> 
       </div>   
    </div>
    
    <div class="d-flex row border border-secondary rounded justify-content-start mt-4 ms-4 pb-2" style="width: 60%">
        <div class ="d-flex justify-content-center mt-3 pb-3">
            <h4>I tuoi dati</h4>
        </div>
        
        <div class="d-flex mt-2 ">
            <div class ="row">
                <div class="d-flex align-items-center ps-5">
                    <h5>Nome:</h5>
                    <div class="ps-4 lead d-flex align-items-center pb-1">
                    <?php echo e(Auth::user()->nome); ?> 
                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Cognome:</h5>
                    <div class="ps-4 lead d-flex align-items-center pb-1">
                    <?php echo e(Auth::user()->cognome); ?>

                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Data di Nascita:</h5>
                    <div class="ps-4 lead d-flex align-items-center pb-1">
                    <?php echo e(Auth::user()->data_nascita); ?>

                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Genere:</h5>
                    <div class="ps-4 lead d-flex align-items-center pb-1">
                    <?php echo e(Auth::user()->genere); ?>

                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Username:</h5>
                    <div class="ps-4 lead d-flex align-items-center pb-1">
                    <?php echo e(Auth::user()->username); ?>

                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Ruolo:</h5>
                    <div class="ps-4 lead d-flex align-items-center pb-2">
                    <?php echo e(Auth::user()->ruolo); ?>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-start ps-5 pt-4 pb-2">
            <div class="d-flex " style="width: 120px">
                <a class="btn btn-primary" href="">Modifica</a>  
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/user/profileLocatore.blade.php ENDPATH**/ ?>