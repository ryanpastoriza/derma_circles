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
            <td></td>
            <td> 
              <button type="button" class="btn btn-primary btn-xs flat"><i class="fa fa-pencil"></i></button> 
              <button type="button" class="btn btn-danger btn-xs flat"><i class="fa fa-remove"></i></button> 
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?= form_open(base_url().'patients/add_diagnosis', ['id' => 'frm-patient-diagnosis']); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Diagnosis &amp; Treatment</h4>
      </div>
      <div class="modal-body">
        
        <div class="row">
            
            <div class="col-sm-4">
                
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

            <div class="col-sm-12">
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