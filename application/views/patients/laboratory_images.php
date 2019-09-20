<?php if( count($images) > 0) { ?>

<?php foreach ($images as $image) : ?>
	
	<div class="col-xs-6 col-md-4">
		<span class="thumbnail text-center">
			<img src="<?= base_url().$image; ?>" title="<?= basename($image); ?>" data-id="<?= $laboratory->laboratory_id; ?>" data-patient_id="<?= $laboratory->patient_id; ?>">
			<small class="form-text text-danger remove-laboratory-image"><i class="fa fa-close"></i> Remove</small>
		</span>
		
	</div>
	<!-- <span class="">  -->
		<!-- <img class="img-fluid" data-file=""  /> -->
		<!-- <br /> -->
		<!-- <span class="remove remove-lab-image">Remove</span> -->
	<!-- </span> -->
	

<?php endforeach;  ?>

<?php } ?>