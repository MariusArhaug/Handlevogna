
<?php if (count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors AS $error){?>
			<p><?php echo $error; ?></p>
		
		<?php } ?>
	</div>
<?php endif ?>