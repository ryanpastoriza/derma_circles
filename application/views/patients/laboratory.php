<div class="row">

  <div class="col-sm-12">
    
    <div class="col-sm-12 text-right">
      <button class="btn btn-sm btn-primary" id="btn-laboratory-modal"><i class="fa fa-plus"></i> Add Laboratory</button>
    </div>

    <div class="col-sm-12 spacer-sm">
      
      <table id="tbl-laboratory-exam" class="table table-bordered">
        <thead>
            <tr>
              <th>Date</th>
              <th>Examination Type</th>
              <th>Results</th>
              <th>Remarks</th>
              <th><i class="fa fa-picture-o"></i></th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if( $laboratory) { ?>
            <?php foreach($laboratory as $key => $value): ?>
            <tr>
              <td><?= date('M d, Y', strtotime($value->transaction_date)); ?></td>
              <td><?= $value->exam_type; ?></td>
              <td><?= $value->results; ?></td>
              <td><?= $value->remarks; ?></td>
              <td>
                <ul class="lab-image-list">
                <?php foreach ($value->images as $image) : ?>
                  <li class="lab-item" data-item="<?= base_url().$image; ?>" ><?= basename($image); ?></li> 
                <?php endforeach; ?>
                </ul>
              </td>
              <td data-id="<?= $value->laboratory_id; ?>"> 
                <button type="button" class="btn btn-primary btn-xs flat edit-laboratory-exam">
                  <i class="fa fa-pencil"></i>
                </button> 
              </td>
            </tr>
            <?php endforeach; ?>
            <?php } ?>
            
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- start Laboratory Examination -->
<div class="modal" id="modal-patient-laboratory-exam">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <?= form_open_multipart(base_url().'patients/add_laboratory', ['id' => 'frm-patient-laboratory']); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Laboratory Examination</h4>
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
                  <label>Transaction Date <i class="fa fa-asterisk text-red"></i> : </label>
                  <input class="form-control" type="date" name="transaction_date" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
              </div>


              <div class="col-sm-12">
                <div class="form-group">
                  <label>Examination Type:</label>
                  <input class="form-control" type="text" name="exam_type" required>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <label>Results / Findings / Interpretation: </label>
                  <textarea class="form-control" name="results" style="resize: none;" rows="6" required=""></textarea>
                </div>
              </div>   

              <div class="col-sm-12">
                <div class="form-group">
                  <label>Remarks: </label>
                  <textarea class="form-control" name="remarks" style="resize: none;" rows="6"></textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              
              <div class="field" align="left">
                <label>Upload Image</label>
                <input type="file" id="laboratory-files" class="btn btn-sm btn-default flat laboratory-files" name="laboratory_files[]" multiple />
              </div>
            
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-close-laboratory-modal" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?= form_close();?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- end laboratory Examination -->


<!-- start edit Laboratory Examination -->
<div class="modal" id="modal-patient-laboratory-exam-edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <?= form_open_multipart(base_url().'patients/update_laboratory', ['id' => 'frm-patient-laboratory-edit']); ?>
      <input type="hidden" name="patient_id" value="<?= $patient->patient_id; ?>">
      <input type="hidden" name="laboratory_id">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Laboratory Examination</h4>
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
                  <label>Transaction Date <i class="fa fa-asterisk text-red"></i> : </label>
                  <input class="form-control" id="lab-edit-transaction-date" type="date" name="transaction_date" required>
                </div>
              </div>
                
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Examination Type</label>
                  <input class="form-control" type="text" name="exam_type" required>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <label>Results / Findings / Interpretation</label>
                  <textarea id="lab-edit-results" class="form-control" name="results" style="resize: none;" rows="6" required=""></textarea>
                </div>
              </div>   

              <div class="col-sm-12">
                <div class="form-group">
                  <label>Remarks</label>
                  <textarea id="lab-edit-remarks" class="form-control" name="remarks" style="resize: none;" rows="6"></textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="col-sm-12">
                <div class="field" align="left" style="min-height: 200px;">
                  <label>Upload Image</label>
                  <input type="file" id="edit-laboratory-files" class="btn btn-sm btn-default flat laboratory-files" name="laboratory_files[]" multiple />
                </div>
              </div>

              <div class="col-sm-12 spacer-lg">
                <div id="laboratory-images"></div>  
              </div>
              
            
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-close-laboratory-modal" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?= form_close();?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- end edit laboratory Examination -->


<script type="text/javascript">
  
  $(function(){

    $('#tbl-laboratory-exam').DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
        "aaSorting": []
    });

  });


</script>