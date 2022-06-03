<?php $__env->startSection('title', 'Nuovo Alloggio'); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
$(function () {
    var actionUrl = "<?php echo e(route('lore.accom.new.submit')); ?>";
    var formId = 'newacocm-form';
    $(":input").on('blur', function(event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#insertaccom").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Form::open(['route' => 'lore.accom.new.submit', 'id' => 'newaccom-form', 'files' => true])); ?>

<?php echo e(Form::token()); ?>

<div class='row'>
    <div class="col mb-3">
        <?php echo e(Form::label('titolo', 'Titolo', ['class' => 'col-sm-2 col-form-label',  'for'=>'titolo'])); ?>

        <?php echo e(Form::text('titolo', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('titolo')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('titolo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('tipo', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'tipo'])); ?>

        <?php echo e(Form::select('tipo', ['appartamento' => "Appartamento", 'posto_letto' => "Posto Letto"],[], ['class' => 'form-control'] )); ?>

        <?php if($errors->first('tipo')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('tipo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('eta_min', 'Età minima', ['class' => 'col-sm-2 col-form-label',  'for'=>'etamin'])); ?>

        <?php echo e(Form::number('eta_min', '18', ['class' => 'form-control'])); ?>

        <?php if($errors->first('eta_min')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('eta_min'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('eta_max', 'Età massima', ['class' => 'col-sm-2 col-form-label',  'for'=>'etamax'])); ?>

        <?php echo e(Form::number('eta_max', '',['class' => 'form-control'] )); ?>

        <?php if($errors->first('eta_max')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('eta_max'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('sesso', 'Preferenza di genere', ['class' => 'col-sm-2 col-form-label',  'for'=>'gender'])); ?>

        <?php echo e(Form::select('sesso', ['' => 'Nessuna Preferenza', 'm' => "Maschio", 'f' => "Femmina", 'b' => "Non Binario"], [], ['class' => 'form-control'] )); ?>

        <?php if($errors->first('sesso')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('sesso'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('prezzo', 'Canone', ['class' => 'col-sm-2 col-form-label',  'for'=>'price'])); ?>

        <?php echo e(Form::number('prezzo', '0', ['class' => 'form-control'])); ?>

        <?php if($errors->first('prezzo')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('prezzo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('superficie', 'Superficie', ['class' => 'col-sm-2 col-form-label',  'for'=>'surface'])); ?>

        <?php echo e(Form::number('superficie', '0', ['class' => 'form-control'])); ?>

        <?php if($errors->first('superficie')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('superficie'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>
</div>
<div class="row">

    <div class="col mb-3">
        <?php echo e(Form::label('data_min', 'Data minima', ['class' => 'col-sm-2 col-form-label',  'for'=>'datamin'])); ?>

        <?php echo e(Form::date('data_min', '', ['class' => 'form-control'])); ?>

        <?php if($errors->first('data_min')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('data_min'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('data_max', 'Data massima', ['class' => 'col-sm-2 col-form-label',  'for'=>'datamax'])); ?>

        <?php echo e(Form::date('data_max', '' ,['class' => 'form-control'])); ?>

        <?php if($errors->first('data_max')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('data_max'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('provincia', 'Provincia', ['class' => 'col-sm-2 col-form-label',  'for'=>'province'])); ?>

        <?php echo e(Form::text('provincia', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('provincia')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('provincia'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('citta', 'Città', ['class' => 'col-sm-2 col-form-label',  'for'=>'city'])); ?>

        <?php echo e(Form::text('citta', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('citta')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('citta'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('indirizzo', 'Indirizzo', ['class' => 'col-sm-2 col-form-label',  'for'=>'address'])); ?>

        <?php echo e(Form::text('indirizzo', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('indirizzo')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('indirizzo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('cap', 'CAP', ['class' => 'col-sm-2 col-form-label',  'for'=>'cap'])); ?>

        <?php echo e(Form::text('cap', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('cap')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('cap'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('posti_letto', 'Posti Letto', ['class' => 'col-sm-2 col-form-label',  'for'=>'bedrooms'])); ?>

        <?php echo e(Form::number('posti_letto', '1', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('posti_letto')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('posti_letto'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('camere', 'Camere', ['class' => 'col-sm-2 col-form-label',  'for'=>'bedrooms'])); ?>

        <?php echo e(Form::number('camere', '1', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('camere')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('camere'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        <?php echo e(Form::label('foto', '', ['class' => 'col-sm-2 col-form-label',  'for'=>'bedrooms'])); ?>

        <?php echo e(Form::file('image')); ?>

        <?php if($errors->first('image')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('image'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('servizi', 'Servizi', ['class' => 'col-sm-2 col-form-label',  'for'=>'services'])); ?>

        <div id="servizi">
        </div>
    </div>

    <div class="col mb-3">
        <?php echo e(Form::label('descrizione', 'Descrizione', ['class' => 'col-sm-2 col-form-label',  'for'=>'desc'])); ?>

        <?php echo e(Form::textarea('descrizione', '', ['class' => 'form-control'] )); ?>

        <?php if($errors->first('descrizione')): ?>
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            <?php $__currentLoopData = $errors->get('descrizione'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center"><?php echo e($message); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>     
        <?php endif; ?>
    </div>
</div>

<div class='d-flex'>
    <?php echo e(Form::submit("Inserisci alloggio", ['class' => 'btn btn-success'])); ?>

</div>
<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/locatore/make_alloggio.blade.php ENDPATH**/ ?>