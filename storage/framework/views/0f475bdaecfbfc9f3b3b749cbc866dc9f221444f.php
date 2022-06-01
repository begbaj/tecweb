<?php $__env->startPush('head'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Chat'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 container">

<div class="page-header py-3 m-8 mx-auto">
	<h1 class="fw-dark text-center">Chat</h1>
</div>
<?php if(count($data['rubrica'])==0): ?>
	<?php if(auth()->user()->hasRole('locatore')): ?>
		<h4 class="text-center">Al momento nessun locatario ha opzionato un tuo alloggio, torna piu' tardi!</h4>
		<h4 class="text-center">Se non ne hai gia' inserito uno, <a href="<?php echo e(route('newaccom')); ?>">perchè non farlo ora!</a></h4>
	<?php endif; ?>
	<?php if(auth()->user()->hasRole('locatario')): ?>
		<h4 class="text-center">
		Nessun contatto, controlla <a href="<?php echo e(route('locatario')); ?>">il nostro catalogo</a>, li potrai avviare una conversazione con
		un locatore, o opzionare uno degli alloggi presenti!
		</h4>
	<?php endif; ?>
<?php else: ?>
<div class="d-flex h-50">
	<div class="deck-columns h-100 overflow-auto">
	<?php $__currentLoopData = $data['rubrica']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<?php echo $__env->make('components.rubricCard', [ '$user' => $user] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	</div>
	<div class="vr"></div>
	<div class="container h-100">
		<h5 class="h-20">
		<?php if($data['chatId']!=null): ?>
			<?php echo e($data['rubrica']->where('id', $data['chatId'])->first()->nome." ".
					$data['rubrica']->where('id', $data['chatId'])->first()->cognome); ?>

		<?php else: ?>
			<?php echo e($data['rubrica'][0]->nome." ".$data['rubrica'][0]->cognome); ?>

		<?php endif; ?>
		</h5>
		<hr/>
	<div class="container h-75 overflow-auto">
		<?php $__currentLoopData = $data['messaggi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messaggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('components.messageCard', [ '$messaggio' => $messaggio], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	</div>
	<div>
	<?php echo e(Form::open(array('route' => array(auth()->user()->hasRole('locatario') ? 'chatLocatario.send' : 'chatLocatore.send', 
		$data['chatId'] ?? $data['rubrica'][0]->id), 'id' => 'sendMessage', 'id_destinatario' => $data['chatId'],'files' => false, 'class'=> 'form-inline d-flex mt-2'))); ?>

		<?php echo e(Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1'])); ?>

		<?php echo e(Form::submit('Invia', ['class' => 'btn btn-primary m-1'])); ?>

        <?php echo e(Form::close()); ?>

	</div>
	</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/user/chat.blade.php ENDPATH**/ ?>