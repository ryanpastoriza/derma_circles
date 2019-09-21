 <div class="row">
  
  <div class="col-sm-12">
    
    <div class="col-sm-12 text-right">
      <button class="btn btn-sm btn-primary" id="btn-diagnosis-modal"><i class="fa fa-plus"></i> Add Diagnosis</button>
    </div>
    
    <div class="col-sm-12 spacer-sm">
    <table class="table table-bordered">
      
      <thead>
          <tr>
            <th>Date</th>
            <th>Diagnosis Type</th>
            <th>Treatment</th>
            <th>Disposition</th>
            <th><i class="fa fa-picture-o"></i></th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
          <?php if($diagnosis) { ?>
          <?php foreach($diagnosis as $key => $value): ?>
          <tr>
            <td><?= $value->transaction_date; ?></td>
            <td><?= $value->diagnosis; ?></td>
            <td><?= $value->treatment; ?></td>
            <td><?= $value->disposition; ?></td>
            <td>
              <ul class="lab-image-list">
              <?php foreach ($value->images as $image) : ?>
                <li class="lab-item" data-item="<?= base_url().$image; ?>" ><?= basename($image); ?></li> 
              <?php endforeach; ?>
              </ul>
            </td>
            <td data-id="<?= $value->diagnosis_id; ?>"> 
              <button type="button" class="btn btn-primary btn-xs flat edit-diagnosis-exam"><i class="fa fa-pencil"></i></button> 
            </td>
          </tr>
          <?php endforeach; ?>
          <?php }else{ ?>
          <tr>
            <td colspan="6">No Data Available</td>
          </tr>
          <?php } ?>
      </tbody>
    </table>
    </div>

  </div>
</div>
 
<!-- Diagnosis and Treatment -->
<div class="modal" id="modal-patient-diagnosis-treatment">
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
                    <label for="">Diagnosis</label>
                    <textarea class="form-control" name="diagnosis" style="resize: none;" rows="6" required></textarea>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Treatment</label>
                    <textarea class="form-control" name="treatment" style="resize: none;" rows="6" required></textarea>
                  </div>
                </div>   

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Disposition</label>
                    <textarea class="form-control" name="disposition" style="resize: none;" rows="6" required></textarea>
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

 
<!-- Diagnosis and Treatment -->
<div class="modal" id="modal-patient-diagnosis-treatment-edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <?= form_open(base_url().'patients/update_diagnosis', ['id' => 'frm-patient-diagnosis-edit']); ?>
      <input type="hidden" name="patient_id" value="<?= $patient->patient_id; ?>">
      <input type="hidden" name="diagnosis_id">
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
                    <label for="">Diagnosis</label>
                    <textarea class="form-control" name="diagnosis" style="resize: none;" rows="6" required></textarea>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Treatment</label>
                    <textarea class="form-control" name="treatment" style="resize: none;" rows="6" required></textarea>
                  </div>
                </div>   

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Disposition</label>
                    <textarea class="form-control" name="disposition" style="resize: none;" rows="6" required></textarea>
                  </div>
                </div>            
            </div>

            <div class="col-sm-6">
              
              <div class="col-sm-12">
                <div class="field" align="left" style="min-height: 200px;">
                  <label>Upload Image</label>
                  <input type="file" id="edit-diagnosis-files" class="btn btn-sm btn-default flat diagnosis-files" name="diagnosis_files[]" multiple />
                </div>
              </div>

              <div class="col-sm-12 spacer-lg">
                 <div id="diagnosis-images"></div>  
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