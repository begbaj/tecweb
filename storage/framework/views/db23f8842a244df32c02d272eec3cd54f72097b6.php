<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid bg-light">
    <div class="jumbotron bg-cover rounded ml-5 mr-5" style="background-image: linear-gradient(to bottom, rgba(3,169,244,0.7) 0%, rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature); background-size: cover">    
      <div class="container text-light">  
        <div class="container bg-transparent mt-5 mb-4 pb-3 pt-5 text-center ">
            <div class="text-center mb-1">
                <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
            </div>
            <h2 class="jumbotron-heading jumbotron-fluid">Benvenuto su Kumuuzag!</h2>
            <h2 class="lead">Registrati!</h2>
            <?php echo e(Form::open(array('route' => 'signin', 'id' => 'signin-form', 'files' => false))); ?>

                <div class= "d-flex justify-content-center pe-5">
                    <div class="form-outline row mb-2 mt-4 w-50">
                        <?php echo e(Form::label('firstname', 'Nome', ['class' => 'col-sm-2 col-form-label', 'for'=>'firstname' ] )); ?>

                        <div class=" col-sm-7 ps-3">
                        <?php echo e(Form::text('firstname','', ['value' => old("firstname"), 'placeholder'=> 'Nome', 'class' => 'form-control ms-5'])); ?>

                        </div>
                    </div>
                </div>
                <div class= "d-flex justify-content-center pe-5">
                    <div class="form-outline row mb-2 mt-4 w-50">
                        <?php echo e(Form::label('lastname', 'Cognome', ['class' => 'col-sm-2 col-form-label ', 'for'=>'lastname' ] )); ?>

                        <div class=" col-sm-7 ps-3">
                        <?php echo e(Form::text('lastname','', ['value' => old("lastname"), 'placeholder'=> 'Cognome', 'class' => 'form-control ms-5'])); ?>

                        </div>
                    </div>
                </div>

                <div class= "d-flex justify-content-center pe-5">
                    <div class="d-flex form-outline row mb-2 mt-3 w-50 align-items-center">
                        <?php echo e(Form::label('birthday', 'Data di nascita', ['class' => 'col-sm-2 col-form-label', 'for'=>'birthday' ] )); ?>

                        <div class=" col-sm-7 ps-3">
                        <?php echo e(Form::date('birthday', \Carbon\Carbon::now() , ['value' => old("birthday"), 'class' => 'form-control ms-5'])); ?>

                        </div>
                    </div>
                </div>

                <div class= "d-flex justify-content-center pe-5">
                    <div class="form-outline row mb-2 mt-2 w-50 align-items-center">
                        <?php echo e(Form::label('gender', 'Genere', ['class' => 'col-sm-2 col-form-label ', 'for'=>'gender' ] )); ?>

                        <div class="d-flex col-7 flex-column ps-3">
                        <?php echo e(Form::select('gender', ['m' => "Maschio", 'f' => "Femmina", 'b' => "Non Binario"], old("gender") , ['class' => 'form-control ms-5'])); ?>

                        </div>
                    </div>
                </div>

                <div class= "d-flex justify-content-center pe-5">
                    <div class="d-flex form-outline row mb-2 mt-3 w-50 align-items-center">
                        <?php echo e(Form::label('username', 'Nome Utente*', ['class' => 'col-sm-2 col-form-label', 'for'=>'username' ] )); ?>

                        <div class=" col-sm-7 ps-3">
                        <?php echo e(Form::text('username', '', ['value' => old("username"), 'placeholder' => 'Nome Utente', 'class' => 'form-control ms-5'])); ?>

                        </div>
                    </div>
                </div>

                <div class= "d-flex justify-content-center pe-5">
                    <div class="form-outline row mb-2 mt-3 w-50">
                        <?php echo e(Form::label('password', 'Password*', ['class' => 'col-sm-2 col-form-label', 'for'=>'password' ] )); ?>

                        <div class=" col-sm-7 ps-3">
                        <?php echo e(Form::password('password', ['value' => old("password"), 'placeholder' => 'Password', 'class' => 'form-control ms-5'])); ?>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center pe-5">
                    <div class="d-flex form-outline row mb-4 mt-4 w-50 align-items-center">
                        <label class="col-sm-2" for="password">Conferma Password</label>
                        <div class="col-sm-7 ps-3">
                            <input type="password" id="password" class="form-control ms-5" placeholder="Password"/>
                        </div>
                    </div>
                </div>    

                <div class= "d-flex justify-content-center pe-5">
                    <div class="form-outline row mb-2 mt-1 w-50 align-items-center">
                        <?php echo e(Form::label('role', 'Ruolo', ['class' => 'col-sm-2 col-form-label', 'for'=>'role' ] )); ?>

                        <div class="d-flex col-7 flex-column">
                        <?php if(isset($_GET['type'])): ?>    
                            <?php echo e(Form::select('role', ['1' => "Locatore", '2' => "Locatario"] , $_GET['type'], ['class' => 'form-control ms-5'])); ?>

                        <?php else: ?>
                            <?php echo e(Form::select('role', ['1' => "Locatore", '2' => "Locatario"] , old("role"), ['class' => 'form-control ms-5'])); ?>

                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            <div class="text-center">
                <?php echo e(Form::submit('Registrati', ['class' => 'btn btn-primary mb-3 mt-2'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

            <div class="text-center mt-3">
                <p><small>Hai già un account? <a href="<?php echo e(route('login')); ?>">Accedi!</a> </small></p>
            </div>
        </div>
      </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', ['hideLoginForm' => True], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/auth/signin.blade.php ENDPATH**/ ?>