<nav class="navbar <?php if(!isset($hideLoginForm)): ?> fixed-top <?php endif; ?> navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('homepage')); ?>"> <img src="<?php echo e(URL::asset('img/brand/logo-colored.png')); ?>" height="50"></a>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            <?php if(Auth::check() && auth()->user()->hasRole('admin')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admcat')); ?>">Catalogo</a>
                </li>
            <?php elseif(Auth::check() && auth()->user()->hasRole('locatore')): ?>
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link" href="<?php echo e(route('catalog')); ?>">Catalogo Pubblico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('newaccom')); ?>">Inserisci Alloggio</a>
=======
                    <a class="nav-link" href="<?php echo e(route('admcat')); ?>">Catalogo Pubblico</a>
>>>>>>> 807c03d6125ccfd7625cd6a15586bcb4fe9eb061
                </li>
            <?php elseif(Auth::check() && auth()->user()->hasRole('locatario')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admcat')); ?>">Ricerca</a>
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
                <?php if(!auth()->user()->hasRole('admin')): ?>
                    <a class="me-4" href="<?php echo e(route('profile')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/></svg></a>
                <?php endif; ?>
            <?php echo e(Form::open(array('route' => 'logout', 'id' => 'navbar-logout', 'files' => false, 'class'=> 'form-inline d-flex mt-3'))); ?>

                <?php echo e(Form::submit('Logout', ['class' => 'btn btn-primary me-2'])); ?>

            <?php echo e(Form::close()); ?>

            <?php elseif(!isset($hideLoginForm)): ?>
            <?php echo e(Form::open(array('route' => 'login', 'id' => 'navbar-login', 'files' => false, 'class'=> 'form-inline d-flex mt-3'))); ?>

                <?php echo e(Form::text('username','', ['placeholder'=> 'username', 'class' => 'form-control me-2'])); ?>

                <?php echo e(Form::password('password', ['placeholder' => 'password', 'class' => 'form-control me-2'])); ?>

                <?php echo e(Form::submit('Accedi', ['class' => 'btn btn-primary me-2'])); ?>

                <a class="btn btn-primary me-2" href="<?php echo e(route('register')); ?>" >Registrati</a>
            <?php echo e(Form::close()); ?>

            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/navbar.blade.php ENDPATH**/ ?>