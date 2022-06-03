<head> 
    <title> Kumuuzag - <?php echo $__env->yieldContent('title'); ?> </title>

    <?php echo $__env->make('components/_meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('meta'); ?>

    <script src="https://kit.fontawesome.com/c0c07ca5e1.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php echo $__env->yieldContent('scripts'); ?>

    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>">
    <?php echo $__env->yieldContent('style'); ?>

</head>
<body>
    <!-- HEADER -->
    <header class="container-mt5 header">
       <?php echo $__env->make('components/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <!-- CONTENT -->
    <div class="container-fluid bg-body">
        <div class="container bg-light mt-5 mb-5 pb-5 pt-5">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

<div class="container">
  <footer class="row row-cols-5 py-5 my-5 border-top">
        <?php echo $__env->make('components/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </footer>
</div>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tecweb/resources/views/layouts/base.blade.php ENDPATH**/ ?>