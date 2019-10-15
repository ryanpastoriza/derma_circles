<script>

	$(function(){
		<?php if($this->session->flashdata('reg_msg')): ?>
			$.notify('New role has been added.', 'success');
		<?php elseif($this->session->flashdata('error')): ?>
			$.notify('Role name already exists.', 'error');
		<?php endif; ?>
	});

	$('.btn-roles').click(function(event) {
		$('.btn-roles').removeClass('btn-primary');
		$(this).addClass('btn-primary')
	});


</script>


<style type="text/css" media="screen">

	.btn-roles {
		margin:2px 2px 2px 2px;
	}

</style>

