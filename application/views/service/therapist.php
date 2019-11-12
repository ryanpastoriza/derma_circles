<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
  	
  	<div class="row">
  		
  		<div class="col-sm-5">
  			
  			<div class="box box-solid">
	            <div class="box-header with-border">
	              <i class="fa fa-hand-stop-o"></i>

	              <h3 class="box-title">Therapist</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">

	            	<div class="row">
	            		<?= form_open(base_url().'therapist/create', ['id' => 'frm-therapist']); ?>
	            		<div class="col-sm-12">
		            		<div class="input-group">
				                <input type="text" class="form-control" name="name" required>
			                    <span class="input-group-btn">
			                      <button type="submit" class="btn btn-info btn-flat" id="btn-add-therapist">Add</button>
			                    </span>
				            </div>
			            </div>
						<?= form_close();?>
			            <div class="col-sm-12 spacer-sm">
			            	
							<table class="table table-hover table-condensed" id="tbl-therapist">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Status</th>
										<th>Branch</th>
									</tr>
								</thead>
								
							</table>

			            </div>

	            	</div>	
	            </div>
          	</div>	

  		</div>


  		<div class="col-sm-7">
  			
  			<div class="box box-solid">
	            <div class="box-header with-border">
	              <i class="fa fa-hand-stop-o"></i>

	              <h3 class="box-title">General Information</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            	
	            	<div class="row">
	            		

	            	</div>	
	            </div>
          	</div>	

  		</div>
  	</div>
  
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
	
	$(function(){

		var oTable = $('#tbl-therapist').DataTable({
			pageLength : 8,
			dom:    "<'row'<'col-sm-12 col-xs-12'f>>",
			ordering: false,
            ajax: { "url" : "<?php echo base_url(); ?>therapist/retrieve" },
            columnDefs: [
                {
                    "targets": [ 0, 3],
                    "visible": false,
                    // "searchable": false
                },
                {
                	render: function(data, type, row){
            			return '<span class="label bg-green">'+row[2]+'</span>';
            		},
            		targets: 2
                }
            ],
		});


		$(document).on('submit', '#frm-therapist', function(e){
			e.preventDefault();

			var form = $(this);
        	var url = form.attr('action');
        	var posting = $.post(url, form.serializeArray() );
				posting.done(function(response){

					console.log(response);
					if( response > 0 ) {
						$.notify("New Therapist Added!", "success");
						oTable.ajax.reload();
						form[0].reset();
					}else{
						$.notify("Something went wrong!", "warn");
					}

				});
		});



	});


</script>