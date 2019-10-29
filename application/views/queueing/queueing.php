<style type="text/css">
  
  /* @media (min-width: 768px) {
    .modal-xl {
      width: 90%;
     max-width:1200px;
  }
*/
  #tbl-patient-list-for-queue tbody tr {
    cursor: pointer;
   }

   #tbl-patient-list-for-queue tbody tr:hover {
    background-color: #337ab7;
    color: #FFF;
   }

   .clicked {
      background-color: #337ab7;
      color: #FFF;
   }
 
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      
  <div class="row">
      
      <div class="col-sm-3">
        <div class="row">
          <div class="col-sm-12">

            <a class="btn btn-app" id="btn-add-patient-queue">
              <span class="badge bg-green" id="count-queue">0</span>
              <i class="fa fa-fast-forward"></i> Check In Patient
            </a>

            <a class="btn btn-app" data-toggle="modal" data-target="#modal-patient-confirm-reset-queue">
              <i class="fa fa-repeat"></i> Reset Queue
            </a>

          </div>

          <div class="col-sm-12 spacer-sm">
              <?php $this->load->view('queueing/patient_queue'); ?>
          </div>
        </div>

      </div>

      <div class="col-sm-9">
          
      </div>

  </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal" id="modal-patient-add-to-queue">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Patient List</h4>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <input type="hidden" name="patient-to-queue">
          <div class="col-sm-12">

             <table id="tbl-patient-list-for-queue" class="table table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>Patient Number</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Gender</th>
                  <th>Contact Number</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($patient_info as $key => $value) : ?>
                <tr>
                  <td><?= $value->patient_id; ?></td>
                  <td><?= $value->lastname; ?></td>
                  <td><?= $value->firstname; ?></td>
                  <td><?= $value->middlename; ?></td>
                  <td><?= $value->gender; ?></td>
                  <td><?= $value->contact_number; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>


        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-add-to-queue">Check in</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal" id="modal-patient-confirm-reset-queue">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Queue Reset</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            
            <div class="alert alert-danger alert-dismissible">
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              You are about to reset <em><strong>Patient Queueing</strong>.</em>
            </div>
           
          </div>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-reset-queue">Confirm</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">

  $(function(){

      var oTable = $('#tbl-queued-patient').DataTable({

        ajax: { "url" : "<?php echo base_url(); ?>queueing/get_patient_queueing" },
        dom:    "<'row'<'col-sm-12 col-xs-12'f>>",
        pageLength : 8,
        fnDrawCallback: function() {
            var count_data = this.api().rows().count();
            $('#count-queue').html(count_data);
        },
      });

      oTable.on( 'order.dt search.dt', function () {
          oTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

      $(document).on('click', '#btn-add-patient-queue', function(event){
        event.preventDefault();

        $('#modal-patient-add-to-queue').modal('show');
      });

      var plistTable = $('#tbl-patient-list-for-queue').DataTable({
        columnDefs: [
              {
                  "targets": [ 0 ],
                  "visible": false,
                  "searchable": false
              },
          ],
      });

      $('#tbl-patient-list-for-queue tbody').on( 'click', 'tr', function () {

        $('#tbl-patient-list-for-queue tbody tr').removeClass('clicked');
        $(this).addClass('clicked');

        var data = plistTable.row( this ).data();

        $('input[name=patient-to-queue]').val(data[0])
      });

      $(document).on('click', '#btn-add-to-queue', function(event){

        event.preventDefault();

        var patient_id = $('input[name=patient-to-queue]').val();
        var url = '<?php echo base_url() ?>queueing/add_patient_to_queue/' + patient_id;
        var posting = $.post(url);
            posting.done(function(response){

              if( response > 0){
                $.notify("Patient Checked In", "success");
                oTable.ajax.reload();

              }else{
                 $.notify("Something Went Wrong! Duplicate Entry Detected", "warn");
              }
              $('#modal-patient-add-to-queue').modal('hide');

            });
      });

      $('#tbl-queued-patient tbody').on( 'click', 'tr', function () {

          $('#tbl-queued-patient tbody tr').removeClass('clicked');
          $(this).addClass('clicked');
      });

      $(document).on('click', '#btn-reset-queue', function(event){
        event.preventDefault();

        var url = '<?php echo base_url().'queueing/reset_queue'; ?>';

        var posting = $.post(url);
           posting.done(function(response){
            oTable.ajax.reload();
              // $.notify("Reset Successful", "success");
              // $('#modal-patient-confirm-reset-queue').modal('hide');
              // oTable.ajax.reload();
           });


      });

  }); 

</script>