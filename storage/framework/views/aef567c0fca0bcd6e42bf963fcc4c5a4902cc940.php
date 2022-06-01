<head>
    <?php echo $__env->make('components/_meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title> Kumuuzag - <?php echo $__env->yieldContent('title'); ?> </title>
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

</html><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/layouts/chat.blade.php ENDPATH**/ ?>