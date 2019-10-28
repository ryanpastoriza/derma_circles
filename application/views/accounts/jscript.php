<script>

	$(function(){
		$('#accounts_tbl').DataTable({
            dom: "<'row'<'col-sm-12 col-xs-12'f>>",
	        "bPaginate": false,
	        "bLengthChange": false,
	        "bInfo": false,
	        "bAutoWidth": false,
	        "aaSorting": []
	    });
	});

	$("#accounts_tbl tbody tr").click(function(event) {
		$('.clicked').removeClass('clicked');
		$(this).addClass('clicked')
		var id = $(this).attr('data-id');
		var username = $(this).attr('data-username');
		var role_id = $(this).attr('data-role-id');
		$("#user_id").val(id);
		$("#username").val(username);
		$("#role_id").val(role_id);
		$("#submit").text('Update');
	});

	function clear_fields() {
		$("#accounts_form input").val('');
		$("#submit").text('Create');
	}

	function submit_form(){
		$("#accounts_form").submit();	
	}
	
</script>

<style type="text/css">
	
	.clicked {
		background-color: #367fa9 !important;
		color: white;
	}

	#accounts_tbl tbody tr:hover{
		background-color: #367fa9 !important;
		cursor:pointer;
		color: white;
	}

</style>