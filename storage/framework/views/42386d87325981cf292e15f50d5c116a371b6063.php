<div class="row">
	<?php if(Auth::id() == $messaggio->id_mittente): ?>
	<div class="col-12 d-flex justify-content-end">
		<?php if(is_null($messaggio->id_alloggio)): ?>
		<div class="card text-right float-right mw-25 m-2 shadow-sm bg-primary text-white align-self-end" data-mdb-ripple-color="light">
		<?php else: ?>
		<div class="card text-right float-right mw-25 m-2 shadow-sm bg-success text-white align-self-end" data-mdb-ripple-color="light">
			<div class="card-header">Opzionamento per l'alloggio <a href="/" class="link-warning"><?php echo e($messaggio->id_alloggio); ?></a></div>
		<?php endif; ?>
	<?php else: ?>
	<div class="col-12 d-flex justify-content-start">
		<?php if(is_null($messaggio->id_alloggio)): ?>
		<div class="card m-2 mw-25 shadow-sm" data-mdb-ripple-color="light">
		<?php else: ?>
		<div class="card m-2 mw-25 shadow-sm bg-success text-white" data-mdb-ripple-color="light">
			<div class="card-header">Opzionamento per l'alloggio <a href="/" class="link-warning"><?php echo e($messaggio->id_alloggio); ?></a></div>
		<?php endif; ?>
	<?php endif; ?>
			<div class="card-body" data-mdb-ripple-color="light">
				<p class="card-text"><small><?php echo e($messaggio->testo); ?></small></p>
			</div>
			<div class="card-footer text-right">
				<?php if(!is_null($messaggio->id_alloggio) OR (is_null($messaggio->id_alloggio) AND Auth::id() == $messaggio->id_mittente)): ?>
				<small><?php echo e($messaggio->created_at); ?></small>
				<?php else: ?>
				<small class="text-muted"><?php echo e($messaggio->created_at); ?></small>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /opt/lampp/htdocs/tecweb/resources/views/components/messageCard.blade.php ENDPATH**/ ?>