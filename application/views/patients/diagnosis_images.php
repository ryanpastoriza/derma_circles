<?php if( count($images) > 0) { ?>

<?php foreach ($images as $image) : ?>
	
	<div class="col-xs-6 col-md-4">
		<span class="thumbnail text-center">
			<img src="<?= base_url().$image; ?>" title="<?= basename($image); ?>" data-path="<?= $image; ?>">
			<small class="form-text text-danger remove-diagnosis-image"><i class="fa fa-close"></i> Remove</small>
		</span>
	</div>
	
<?php endforeach;  ?>

<?php } ?>