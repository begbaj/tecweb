<nav class="navbar <?php if(!isset($hideLoginForm)): ?> fixed-top <?php endif; ?> navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('homepage')); ?>"> <img src="<?php echo e(URL::asset('img/brand/logo-colored.png')); ?>" height="50"></a>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            <?php if(Auth::check() && auth()->user()->hasRole('admin')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.stats')); ?>">Statistiche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.faq')); ?>">Gestione FAQ</a>
                </li>
            <?php elseif(Auth::check() && auth()->user()->hasRole('locatore')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('catalog')); ?>">Catalogo Pubblico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('lore.accom.new')); ?>">Inserisci Alloggio</a>
                </li>
            <?php elseif(Auth::check() && auth()->user()->hasRole('locatario')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('lario')); ?>">Ricerca</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('catalog')); ?>">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('who')); ?>">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('faq')); ?>">FAQs</a>
                </li>
            <?php endif; ?>    
            </ul>
            
             
            <?php if(Auth::check()): ?>

                <?php if(auth()->user()->hasRole('locatario') or auth()->user()->hasRole('locatore')): ?>
		    <a class="me-4" href="<?php echo e(route('chat')); ?>">
			<img src="<?php echo e(asset('img/message-square.svg')); ?>">
		    </a>
		    <a class="me-4" href="<?php echo e(route('profile.me')); ?>">
			<img src="<?php echo e(asset('img/user.svg')); ?>">
		    </a>
                <?php endif; ?>

            <?php echo e(Form::open(array('route' => 'logout', 'id' => 'navbar-logout', 'files' => false, 'class'=> 'form-inline d-flex mt-3'))); ?>

                <?php echo e(Form::submit('Logout', ['class' => 'btn btn-primary me-2'])); ?>

            <?php echo e(Form::close()); ?>


            <?php elseif(!isset($hideLoginForm)): ?>

            <?php echo e(Form::open(array('route' => 'login', 'id' => 'navbar-login', 'files' => false, 'class'=> 'form-inline d-flex mt-3'))); ?>

                <?php echo e(Form::text('username','', ['placeholder'=> 'username', 'class' => 'form-control me-2'])); ?>

                <?php echo e(Form::password('password', ['placeholder' => 'password', 'class' => 'form-control me-2'])); ?>

                <?php if($errors->first('password') or $errors->first('username')): ?>
                    <?php echo e(Form::submit('Accedi', ['class' => 'btn btn-danger me-2'])); ?>

                     
                <?php else: ?>
                    <?php echo e(Form::submit('Accedi', ['class' => 'btn btn-primary me-2'])); ?>

                <?php endif; ?>
                <a class="btn btn-primary me-2" href="<?php echo e(route('register')); ?>" >Registrati</a>
            <?php echo e(Form::close()); ?>

            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/navbar.blade.php ENDPATH**/ ?>