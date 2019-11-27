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
	            		<input type="hidden" name="therapist_id" value="0">
	            		<div class="col-sm-12">
	            			<div class="form-group">
						      	<label>Therapist Name* :</label>
						      	<input type="text" class="form-control input-sm" name="name" required>
						    </div>

						    <div class="form-group">
	            				<label>Branch</label>
	            				<input type="text" class="form-control input-sm" disabled value="<?php echo ucwords($this->session->userdata()['branch']->branch_name); ?>">
	            			</div>

	            		  </div>

	            		  <div class="col-sm-12 text-right">
	            		  	<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
	            		  </div>
			          
						<?= form_close();?>
			            <div class="col-sm-12 spacer-sm">
			            	
							<table class="table table-hover table-condensed" id="tbl-therapist">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Type</th>
										<th>Status</th>
										<th>Branch</th>
										<th>Actions</th>
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
	            		
	            	<?php
	            		// echo '<pre>';
	            		// var_export($services);
	            		// echo '</pre>';

	            	?>	
	            	<div class="row">
	            		
	            		<div class="col-sm-6">
	            			<div class="form-group">
						      	<label>Therapist Name :</label>
						      	<select class="form-control input-sm">
						      		<option value="0">All</option>
						      		<?php foreach ($therapist as $key => $value) : ?>
			                			<option value="<?= $value->therapist_id; ?>"><?= ucwords($value->name); ?></option>
			                		<?php endforeach; ?>
						      	</select>
						    </div>
	            		</div>

	            		<div class="col-sm-6">
	            			<div class="form-group">
				                <label>Custom Date:</label>

				                <div class="input-group">
				                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
				                    <span>
				                      <i class="fa fa-calendar"></i> Date range picker
				                    </span>
				                    <i class="fa fa-caret-down"></i>
				                  </button>
				                </div>
				            </div>
	            		</div>

	            		<div class="col-sm-12">
	            			<table class="table table-condensed table-bordered">
	            				<thead>
	            					<tr>
	            						<th>Therapist</th>
	            						<th>Service</th>
	            						<th>Date</th>
	            					</tr>
	            				</thead>
	            				<tbody>
	            					<?php foreach ($services as $key => $value) :?>
	            						<tr>
	            							<td><?= ucwords($value->name); ?></td>
	            							<td><?= ucwords($value->service_name); ?></td>
	            							<td><?= date('M-d-Y', strtotime($value->date_created)); ?></td>
	            						</tr>
	            					<?php endforeach; ?>
	            				</tbody>
	            			</table>
	            		</div>

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
                    "targets": [ 0, 2, 4],
                    "visible": false,
                },
                {
	            "targets": -1,
	            "data": null,
	            "defaultContent": "<button class='btn btn-primary btn-sm therapist-edit'><i class='fa fa-pencil'></i></button> " + 
	            				  "<button class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>"
	       		},
            ],
		});


		 $('#tbl-therapist tbody').on( 'click', '.therapist-edit', function () {
	        var data = oTable.row( $(this).parents('tr') ).data();

	        $('input[name=therapist_id]').val(data[0]);
	        $('input[name=name]').val( data[1] );
	    } );


		$(document).on('submit', '#frm-therapist', function(e){
			e.preventDefault();

			var form = $(this);
        	var url = form.attr('action');

        	var posting = $.post(url, form.serializeArray() );
				posting.done(function(response){
					console.log(response);
					if( response > 0 ) {
						var update = $('input[name=therapist_id]').val();
						$('input[name=therapist_id]').val(0);
						$.notify("Changes has been saved!", "success");
						oTable.ajax.reload();
						form[0].reset();
					}else{
						$.notify("Something went wrong!", "warn");
					}

				});
		});

		 $('#daterange-btn').daterangepicker(
	      {
	        ranges   : {
	          'Today'       : [moment(), moment()],
	          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
	          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
	          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        },
	        startDate: moment().subtract(29, 'days'),
	        endDate  : moment()
	      },
	      function (start, end) {
	        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	      }
	    )



	});


</script>