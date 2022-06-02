<head> 
    
    <title> Kumuuzag - <?php echo $__env->yieldContent('title'); ?> </title>
    <?php echo $__env->make('components/_meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script type="text/javascript" src="src/jquery.js"></script>
    <script type="text/javascript">
            window.onload = function () {
                    cards = document.getElementsByClassName('card-text');

                    for(i=0; i< cards.length; i++){
                            cards[i].innerHTML = truncateText(cards[i].innerHTML, 120);
                    }

		    cards = document.getElementsByClassName('card-text text-muted float-end')

                    for(i=0; i< cards.length; i++){
                            cards[i].innerHTML = truncateText(cards[i].innerHTML, 30);
                    }
            }

            function truncateText(text, max_char){
                    if(text.length <= max_char){
                            return text;
                    }
                    return  text.slice(0,max_char-2) + '...';
            }
    </script>
    <?php echo $__env->yieldSection(); ?>
    
    <?php echo $__env->yieldContent('extra-head'); ?>
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
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/layouts/public.blade.php ENDPATH**/ ?>