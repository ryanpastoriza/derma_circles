<script>
	
	$(function(){
		branches()
	})


	function branches(){
		$.getJSON('<?=base_url('branches/branches')?>', {param1: 'value1'}, function(json, textStatus) {
			var tr = "";
			$.each(json, function(index, val) {
				tr += " <tr>\
							<td><span class='edit_branch' data-pk='"+val.branch_id+"'>"+val.branch_name+"</span></td>\
							<td><span class='edit_addr' data-pk='"+val.branch_id+"'>"+val.location+"</span></td>\
						</tr>";
			});
			$("#branch_tbody").html(tr)
			$("#branch_tbl").dataTable();
		});
	}
	

	function addBranch(){
		var branch_name = $("#branch_name").val();
		var location    = $("#location").val();

		if(!branch_name || !location){
			$.notify('All fields are required.', 'error');
		}
		else{
			$.post('<?=base_url('branches/add_branch')?>', {branch_name: branch_name, location: location}, function(data, textStatus, xhr) {
				if(data != 'true'){
					$(".branch_errors").html($.parseJSON(data));
					$(".branch_errors").removeClass('hidden')
				}
				else{
					$("#branch_name").val('');
					$("#location").val('');		
					branches();
					$.notify('New branch has been successfully added.', 'success');
				}
			});
		}
	}

	function editMode(){
		$(".edit_mode").addClass('hidden')
		$(".done_edit").removeClass('hidden')
		editables();
	}

	function doneEdit() {
		$(".done_edit").addClass('hidden')
		$(".edit_mode").removeClass('hidden')
		
		$('.edit_branch').editable('destroy');
		$('.edit_addr').editable('destroy');

	}

	function editables() {
		$(".edit_branch").editable({
			mode: 'inline',
			url: "<?=base_url('branches/update_branch')?>",
			success: function(response, newValue) {
				if( response == 'true' ){
					$.notify('Update successful.', 'success');
				}
				if( response == 'false' ){
					return 'Something went wrong';
				}
		    }
		});
		$(".edit_addr").editable({
			mode: 'inline',
			url: "<?=base_url('branches/update_location')?>",
			success: function(response, newValue) {
				if( response == 'true' ){
					$.notify('Update successful.', 'success');
				}
				if( response == 'false' ){
					return 'Something went wrong';
				}
		    }
		});
	}

</script>