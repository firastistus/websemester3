<?php if (isset($errors)){ ?>
	<div class="alert alert-dismissable alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?php foreach ($errors as $error) {?>
			<strong><?php echo $error ?></strong>
		<?php } ?>
	</div>
<?php } ?>