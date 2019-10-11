<div class="row">

	<div class="col-sm-12">

		<div class="col-sm-12 text-right">
		  <button class="btn btn-sm btn-primary" id="btn-diagnosis-modal"><i class="fa fa-plus"></i> Add Laboratory</button>
		</div>

		<div class="col-sm-12 spacer-sm">
		  
		  <table id="tbl-diagnosis-exam" class="table table-bordered">
		    <thead>
		        <tr>
		          <th>Date</th>
		          <th>Diagnosis</th>
		          <th><i class="fa fa-picture-o"></i></th>
		          <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    </tbody>
		  </table>
		</div>

	</div>
</div>

<!-- Diagnosis -->
<div class="modal" id="modal-patient-diagnosis">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <?= form_open(base_url().'patients/add_diagnosis', ['id' => 'frm-patient-diagnosis']); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Diagnosis &amp; Treatment</h4>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <div class="user-block">
                <img class="img-circle" src="<?php echo base_url().'assets' ?>/img/avatar.png" alt="User Image">
                <span class="username">
                  <?= ucwords($patient->firstname.' '.$patient->middlename.' '.$patient->lastname.' '.$patient->suffix); ?></span>
                <span class="description">Patient Number: <?= $patient->patient_id; ?></span>
              </div>
            </div>
          </div>
        </div>    
    

        <div class="row spacer-sm">
            
            <div class="col-sm-6">

            	<div class="col-sm-12">
	                <div class="form-group">
	                  <label>Transaction Date: </label>
	                  <input class="form-control" type="date" name="transaction_date" value="<?php echo date('Y-m-d'); ?>" required>
	                </div>
	            </div>
                
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Diagnosis</label>
                    <textarea class="form-control" name="diagnosis" style="resize: none;" rows="6"></textarea>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
              
              <div class="field" align="left">
                <label>Upload Image</label>
                <input type="file" id="diagnosis-files" class="btn btn-sm btn-default flat diagnosis-files" name="diagnosis_files[]" multiple />
              </div>
            
            </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    <?= form_close();?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>