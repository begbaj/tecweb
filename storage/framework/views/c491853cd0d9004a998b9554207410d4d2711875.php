<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid bg-light">
    <div class="jumbotron bg-cover rounded ml-5 mr-5" style="background-image: linear-gradient(to bottom, rgba(3,169,244,0.7) 0%, rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature); background-size: cover">    
      <div class="container text-light">  
        <div class="container bg-transparent mt-5 mb-4 pb-0 pt-5 text-center ">
            <div class="text-center mb-3">
                <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
            </div>
            <h2 class="jumbotron-heading jumbotron-fluid"> Benvenuto su Kumuuzag!</h2>
            <h2 class="lead"> Effettua il login.</h2>
            <?php echo e(Form::open(array('route' => 'login', 'class' => 'contact-form'))); ?>

                <div class= "d-flex justify-content-center">
                    <div class="form-outline row mb-2 mt-4 w-50">
                        <?php echo e(Form::label('username', 'Nome Utente', ['class' => 'label-input'])); ?>

                        <div class="d-flex justify-content-center">
                            <div class="col-sm-7 pt-1">
                            <?php echo e(Form::text('username', '', ['class' => 'input','id' => 'username'])); ?>

                            </div>
                        </div>
                    <?php if($errors->first('username')): ?>
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>     
                    <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-outline row mb-2 mt-4 w-50 ">
                        <?php echo e(Form::label('password', 'Password', ['class' => 'label-input'])); ?>

                        <div class="d-flex justify-content-center">
                            <div class="col-sm-7 pt-1">
                                <?php echo e(Form::password('password', ['class' => 'input', 'id' => 'password'])); ?>

                            </div>
                        </div>
                    <?php if($errors->first('password')): ?>
                     <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>      
                    <?php endif; ?>
                    </div>
                </div>    
            <div class="text-center mt-3">
                <?php echo e(Form::submit('Login', ['class' => 'btn btn-primary mb-3 mt-2'])); ?>                
            </div>
            <div class="text-center mt-3 pb-3">
                <p><small>Non sei ancora registrato? <a href="<?php echo e(route('register')); ?>">Registrati ora!</a></small></p>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
      </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', ['hideLoginForm' => True], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/auth/login.blade.php ENDPATH**/ ?>