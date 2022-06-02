<?php $__env->startSection('title', 'Statistiche'); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->user('admin')): ?>
<?php echo e(Form::open(array('route' => 'stats', 'id' => 'filter-form', 'files' => false, 'method'=>'GET' ))); ?>

    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                <?php echo e(Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type'])); ?>

                <div class="col-sm-10 ps-3">
                <?php echo e(Form::select('type', ['appartamento' => "appartamento", 'posto-letto' => "posto letto"], old("type"), ['class' => 'form-control ms-5'])); ?>

                </div>
            </div>
            
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <?php echo e(Form::label('start-date', 'Inizio', ['class' => 'col-sm-3 col-form-label', 'for' => 'start-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('start-date', "", ['value' => null, 'class' => 'form-control ms-6'])); ?>

                </div>
                    <?php if($errors->first('start-date')): ?>
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        <?php $__currentLoopData = $errors->get('start-date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>    
                    <?php endif; ?>         
            </div>

            <div class="form-outline row ms-3 mb-4 mt-4 w-25">
                <?php echo e(Form::label('end-date', 'Fine', ['class' => 'col-sm-3 col-form-label', 'for' => 'end-date'])); ?>

                <div class="col-sm-9 ps-3">
                <?php echo e(Form::date('end-date', "", ['value' => null, 'class' => 'form-control ms-6'])); ?>

                </div>
            </div>
                  <?php if($errors->first('end-date')): ?>
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        <?php $__currentLoopData = $errors->get('end-date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>    
                    <?php endif; ?>  
            <div class="text-center col pt-2 ps-4">
                <?php echo e(Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2 ms-5'])); ?>

            </div>
        </div>
    </div> 
    <?php echo e(Form::close()); ?>

    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                <p> Offerte di Alloggio </p>
                <div class="col-sm-10 ps-3">
                    <?php if(Route::is('stats')): ?>                    
                    <?php echo e($count_rent); ?>

                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <p> Offerte di Locazione </p>
                <div class="col-sm-9 ps-3">
                    <?php if(Route::is('stats')): ?>
                    <?php echo e($count_request); ?>

                    <?php endif; ?>
                </div>    
            </div>
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <p> Alloggi Locati </p>
                <div class="col-sm-9 ps-3">
                    <?php if(Route::is('stats')): ?>                    
                    <?php echo e($count_assigned); ?>

                    <?php endif; ?>
                </div>    
            </div>
        </div>
    </div> 

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/statistics.blade.php ENDPATH**/ ?>