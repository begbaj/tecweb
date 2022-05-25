<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid bg-light rounded">
    <div class="jumbotron bg-cover rounded ml-5 mr-5" style="background-image: linear-gradient(to bottom, rgba(3,169,244,0.7) 0%, rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature); background-size: cover">    
      <div class="container text-light">  
        <div class="container bg-transparent mt-5 mb-4 pb-3 pt-5 text-center ">
            <div class="text-center mb-1">
                <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
            </div>
            <h2 class="jumbotron-heading jumbotron-fluid"> Benvenuto su Kumuuzag!</h2>
            <h2 class="lead">Registrati!</h2>
            <form>
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex pe-5">
                            <div class="form-outline row mb-2 mt-4 w-75">
                                <label class="col-sm-2 col-form-label" for="Nome"><strong>Nome</strong></label>
                                <div class="col-sm-7 ps-4">
                                    <input type="nome" id="nome" class="form-control ms-5" palceholder="nome" />
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex pe-5">
                            <div class="form-outline row mb-2 mt-4 w-75">
                                <label class="col-sm-2 col-form-label" for="COgnome"><strong>Cognome</strong></label>
                                <div class="col-sm-7 ps-4">
                                    <input type="cognome" id="cognome" class="form-control ms-5" palceholder="cognome" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex text-center">
                <button class="btn btn-primary mb-3 mt-2" type="button">Registrati</button>
            </div>
            <div class="text-center mt-3">
                <p><small>Hai già un account? <a href="<?php echo e(route('login')); ?>">Accedi!</a> </small></p>
            </div>
        </div>
      </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', ['hideLoginForm' => True], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/signin.blade.php ENDPATH**/ ?>