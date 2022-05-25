 

<?php $__env->startSection('content'); ?>
<?php if(isset($faq)): ?>
<?php $count=0; ?>
<?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container text-center">
<p class= "text-dark"> <?php echo ++$count; ?> <?php echo e($faq->domanda); ?> </p>
<p class="text-secondary"><?php echo e($faq->risposta); ?> </p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/faq.blade.php ENDPATH**/ ?>