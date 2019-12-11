<style type="text/css">
	
	#tbl-select-package tbody tr {
    cursor: pointer;
   }

   #tbl-select-package tbody tr:hover {
    background-color: #337ab7;
    color: #FFF;
   }

   .clicked {
    background-color: #337ab7;
    color: #FFF;
   }


</style>


<div class="content-wrapper">
  <section class="content">
  	
		<div class="row">
  		
  		<div class="col-sm-4">
  			
  			<div class="box box-solid">
	            <div class="box-header with-border">
	              <!-- <i class="fa fa-hand-stop-o"></i> -->

	              <h3 class="box-title">Service</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            	
					<div class="row">

						<?= form_open(base_url().'service/add_service', ['id' => 'frm-add-service']); ?>
						<div class="col-sm-12">
							<div class="form-group">
			                	
			                	<label for="">Patient:</label>
			                	<input type="text" id="patient-name" list="patient-list" class="form-control" placeholder="Patient Name" required>
			                	<datalist id="patient-list">
			                		<?php foreach ($patients as $key => $value) : ?>
			                			<option value="<?= ucwords($value->lastname.', '.$value->firstname.' '.$value->middlename[0].'. '.$value->suffix); ?>" data-id="<?= $value->patient_id; ?>">
			                						
			                			</option>	
			                		<?php endforeach; ?>
			                		
			                	</datalist>
			                </div>

			                <div class="form-group">
			                	<label for="">Package:</label>
				                <button type="submit" class="btn btn-success btn-sm" id="select-package">Select Package</button>
			                </div>
			                <div class="form-group">
			                	<input type="hidden" name="service_id" id="service-id">
			                 	<dl>
					                <dt>Package:</dt>
					                <dd><input type="text" class="form-control" id="id-package"  disabled /></dd>
					                <dt>Service:</dt>
					                <dd><input type="text" class="form-control" id="id-service" disabled  /></dd>
					                <dt>Price:</dt>
					                <dd><input type="text" class="form-control" id="id-price" disabled /></dd>					               
					            </dl>
								
								<div class="text-right">
									<a href="#" style="text-decoration: underline;" id="clear-service-package"> Clear </a>
								</div>

			                </div>

							<div class="form-group">
			                	
			                	<label for="">Facialist:</label>
			                	<select class="form-control" id="therapist" name="therapist_id" required>
			                			<option value="">Select</option>
			                		<?php foreach ($therapist as $key => $value) : ?>
			                			<option value="<?= $value->therapist_id; ?>"><?= ucwords($value->name); ?></option>
			                		<?php endforeach; ?>
			                	</select>
			                </div>
		                </div>

		                <div class="col-sm-12 text-right">
		                	<button class="btn btn-sm btn-default" id="btn-clear-service">Clear</button>
		                	<button type="submit" class="btn btn-sm btn-primary">Add Service</button>
		                </div>
						<?= form_close();?>

					</div>

	            </div>
          	</div>	

  		</div>


  		<div class="col-sm-8">
  			
  			<div class="box box-solid">
	            <div class="box-header with-border">
	              <!-- <i class="fa fa-hand-stop-o"></i> -->

	              <h3 class="box-title">Service Information</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            	
	            	<div class="row">
						
						<div class="col-sm-4">
							<div class="form-group">
			                  <label>Facialist</label>
			                  <select class="form-control" name="" id="filter-facialist">
			                			<option value="">Select</option>
			                		<?php foreach ($therapist as $key => $value) : ?>
			                			<option value="<?= $value->therapist_id; ?>"><?= ucwords($value->name); ?></option>
			                		<?php endforeach; ?>
			                	</select>
			                </div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
			                  <label>Patient</label>
			                  <input type="text" id="filter-patient-name" list="patient-list" class="form-control" placeholder="Patient Name" required>
			                	<datalist id="patient-list">
			                		<?php foreach ($patients as $key => $value) : ?>
			                			<option value="<?= ucwords($value->firstname.' '.$value->middlename[0].'. '.$value->lastname.' '.$value->suffix); ?>" data-id="<?= $value->patient_id; ?>">
			                						
			                			</option>	
			                		<?php endforeach; ?>
			                		
			                	</datalist>
			                </div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
			                  <label>Date</label>
			                  <div class="input-group">
				                  <button type="button" class="btn btn-default pull-right" id="daterange-services-btn">
				                    <span>
				                      <i class="fa fa-calendar"></i> Date range picker
				                    </span>
				                    <i class="fa fa-caret-down"></i>
				                  </button>
				                </div>
			                </div>
						</div>

	            		<div class="col-sm-12">
	            			<div id="service-transactions"></div>
	            		</div>

	            	</div>	
	            </div>
          	</div>	

  		</div>
		
  	</div>

  
    
  </section>

</div>


<!-- modal -->
<div class="modal" id="modal-select-package">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Packages</h4>
      </div>
      <div class="modal-body">
        
        <div class="row">
        	
        	<div class="col-sm-12">
        		
				<table class="table table-hover table-condensed" id="tbl-select-package">
					<thead>
						<tr>
							<th>#</th>
							<th>Package</th>
							<th>Service</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php  foreach ($services as $key => $value) : ?>
							<tr>
								<td><?= strtoupper($value->services_id); ?></td>
								<td><?= strtoupper($value->package_name); ?></td>
								<td><?= ucwords($value->service_name); ?></td>
								<td><?= number_format($value->price, 2); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

        	</div>


        </div>


      </div>
      <div class="modal-footer">

        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
        <!-- <button type="submit" class="btn btn-primary" id="btn-select-package">Select Package</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	
	$(function(){

		// call_service_transactions(null, null, null);

		$(document).on('click', '#select-package', function(e){
			e.preventDefault();

			var modal = $('#modal-select-package');
			modal.modal('show');
		});

		var oTable = $('#tbl-select-package').DataTable();

		$('#tbl-select-package tbody').on( 'click', 'tr', function () {
          
	        $('#tbl-select-package tbody tr').removeClass('clicked');
	        $(this).addClass('clicked');

	        var data = oTable.row( this ).data();

	        $('#service-id').val(data[0]);

	        $('#id-package').val(data[1]);
	        $('#id-service').val(data[2]);
	        $('#id-price').val(data[3]);

	        var modal = $('#modal-select-package');
			modal.modal('hide');
      	});

      	$(document).on('submit', '#frm-add-service', function(e){
      		e.preventDefault();

      		var name 		= $('#patient-name').val();
      		var patient_id 	= $('#patient-list').find('option[value="' + name + '"]').attr('data-id');

      		console.log(patient_id);

      		var service_id  = $('#service-id').val();

      		if( typeof(patient_id) == 'undefined' ){
      			 $.notify("Patient may not be on the list. ", "warn");
      			return false;
      		}

      		if( service_id == '' ){
      			$.notify("Please Select a Package! ", "warn");
      			return false;	
      		}

      		var form 		= $(this);
      		var data 		= form.serializeArray();
      		data.push({ name: 'patient_id', value : patient_id });

      		var url = form.attr('action');
      		var posting = $.post(url, data );
      				posting.done(function(response){
      					console.log(response);
      					$('#service-id').val('');
      					form[0].reset();
      					call_service_transactions('','', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
      				});
      	});

      	$(document).on('click', '#btn-clear-service', function(e){
      		e.preventDefault();

      		var form = $('#frm-add-service');
			$('#service-id').val('');
			form[0].reset();
      	});

      	$(document).on('click', '#clear-service-package', function(e){
      		e.preventDefault();

      		$('#service-id').val('');
	        $('#id-package').val('');
	        $('#id-service').val('');
	        $('#id-price').val('');	
      	});

      	var sTable = $('#tbl-service-transactions').DataTable();

      	$(document).on('change', '#filter-patient-name', function () {


		    var facialist_id = $('#filter-facialist').val();

      		var name 		= this.value
      		var patient_id;

      		if( name == '' || name.length <= 0 ){
      			patient_id = '';
      		}else{
      			patient_id 	= $('#patient-list').find('option[value="' + name + '"]').attr('data-id');
      		}

      		call_service_transactions(facialist_id, patient_id, start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

		   
		});

      	$(document).on('change', '#filter-facialist', function(){

      		var facialist_id = $(this).val();

      		var name 		= $('#filter-patient-name').val();
      		var patient_id;

      		if( name == '' || name.length <= 0 ){
      			patient_id = '';
      		}else{
      			patient_id 	= $('#patient-list').find('option[value="' + name + '"]').attr('data-id');
      		}

      		call_service_transactions(facialist_id, patient_id, start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
      	});	


	    var start = moment();
    	var end = moment();

    	cb(start, end);

	    function cb(startDate, endDate) {
	    	if(startDate.format('DD/MM/YYYY') == '01/01/1970') {
	            $('#daterange-services-btn span').html('All time');
	        }else {
	            $('#daterange-services-btn span').html(startDate.format('MMM D, YYYY') + ' - ' + endDate.format('MMM D, YYYY'));
	        }

	        var facialist_id = $('#filter-facialist').val();

      		var name 		= $('#filter-patient-name').val();
      		var patient_id;

      		if( name == '' || name.length <= 0 ){
      			patient_id = '';
      		}else{
      			patient_id 	= $('#patient-list').find('option[value="' + name + '"]').attr('data-id');
      		}

      		start = startDate;
      		end = endDate;

	        call_service_transactions(facialist_id, patient_id, start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
	    }

	    $('#daterange-services-btn').daterangepicker(
	      {
	        ranges   : {
	          'All time': [moment('1970-01-01'), moment()],
	          'Today'       : [moment(), moment()],
	          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
	          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
	          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        },
	        startDate: start,
	        endDate  : end
	      }, cb
	    )

	});


	function call_service_transactions(facialist_id, patient_id, date_from, date_to) {

		var data = [];

		if( patient_id == undefined ){
			patient_id = '';
		}

		data.push({ 'facialist_id' : facialist_id, 'patient_id' : patient_id, 'date_from' : date_from, 'date_to' : date_to });

		// console.log(data);
		$('#service-transactions').html('');
		var url = '<?php echo base_url('service/get_service_transactions'); ?>'
		var posting = $.post(url, { data: data });
			posting.done(function(response){
				$('#service-transactions').html(response);
			});
	}

</script>