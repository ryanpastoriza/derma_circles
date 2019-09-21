<style type="text/css">

  #patient-patient-number {
    font-size: 100%;
  }

  @media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    
    <div class="row">
      
      <div class="col-md-3">
        <?php $this->load->view('patients/patient_list'); ?>
      </div>
      <!-- start patient list and information -->
      <div class="col-md-9">
        <!-- <form id="frm-patient"> -->
        <?= form_open(base_url().'patients/add_patient', ['id' => 'frm-patient']); ?>
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Patient Information</h3>

              <div class="pull-right box-tools">
                <button type="button" id="btn-clear-patient" class="btn btn-danger btn-sm">
                  <i class="fa fa-eraser"></i>
                </button>
                <button type="submit" id="btn-patient-save" class="btn btn-primary btn-sm">
                  <i class="fa fa-save"></i>
                </button>
              </div>
          </div>

          <div class="box-body">
            
            <div class="row">
             
              <div class="col-sm-12 spacer-sm">
                  <div class="col-sm-3 form-group">
                      <label for="">Last Name</label>
                      <input type="text" class="form-control" id="patient-lastname"  name="lastname" required>
                  </div>
                  <div class="col-sm-3 form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" id="patient-firstname" name="firstname" required>
                  </div>
                  <div class="col-sm-3 form-group">
                      <label for="">Middle Name</label>
                     <input type="text" class="form-control" id="patient-middlename" name="middlename" required>
                  </div>
                  <div class="col-sm-3 form-group">
                     <label for="">Suffix</label>
                     <input type="text" class="form-control" id="patient-suffix" name="suffix">
                  </div>
              </div>

              <div class="col-sm-9">
                <div class="col-sm-4 form-group">
                  <label for="">Birthdate</label>
                  <input type="date" class="form-control" id="patient-birthdate" name="birthdate">
                </div>
                <div class="col-sm-4 form-group">
                  <label for="">Age</label>
                  <input type="text" class="form-control" id="patient-age" disabled>
                </div>
                <div class="col-sm-4 form-group">
                  <label for="">Gender</label>
                  <select class="form-control" id="patient-gender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                 <div class="col-sm-4 form-group">
                  <label for="">Height</label>
                  <input type="text" class="form-control" id="patient-height" name="height">
                </div>
                 <div class="col-sm-4 form-group">
                  <label for="">Weight</label>
                  <input type="text" class="form-control" id="patient-weight" name="weight">
                </div>
                 <div class="col-sm-4 form-group">
                  <label for="">Blood Type</label>
                  <input type="text" class="form-control" id="patient-blood-type" name="blood_type">
                </div>

                <div class="col-sm-4 form-group">
                  <label for="">Civil Status</label>
                  <select class="form-control" id="patient-civil-status" name="civil_status">
                    <option value="">Select Civil Status</option>
                    <option value="married">Married</option>
                    <option value="widowed">Widowed</option>
                    <option value="separated">Separated</option>
                    <option value="divorced">Divorced</option>
                    <option value="single">Single</option>
                  </select>
                </div>
                <div class="col-sm-4 form-group">
                   <label for="">Email</label>
                   <input type="email" id="patient-email" class="form-control" name="email_address">
                </div>
                <div class="col-sm-4 form-group">
                   <label for="">Citizenship</label>
                   <input type="text" id="patient-citizenship" class="form-control" name="citizenship">
                </div>
                <div class="col-sm-4 form-group">
                   <label for="">Contact No.</label>
                   <input type="text" class="form-control" id="patient-contact-number" name="contact_number" required>
                </div>

                <div class="col-sm-8 form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" id="patient-address" name="address" rows="1" style="resize: none;"></textarea>
                </div>
              </div>

              <div class="col-sm-3 text-center">
                <div class="col-sm-12">
                  <img src="<?php echo base_url().'assets' ?>/img/avatar.png" class="img-thumbnail" style="width: 150px;">
                </div>
                <div class="col-sm-12 text-center spacer-sm">
                  <div class="col-sm-12">
                    <label>Patient Number</label> 
                  </div>
                  <div class="col-sm-12">
                    <span id="patient-patient-number" class="label bg-blue">000</span>
                    <input type="hidden" id="patient-number-input" name="patient_id">
                  </div>
                </div>
              </div>
             

            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <?= form_close();?>
      </div>
      <!-- end patient list and information -->
    </div>
    

    <!-- patient laboratory and diagnosis -->
    <div class="row">

      <div class="col-sm-12">
        <?php $this->load->view('patients/laboratory_and_treatment'); ?>
      </div>

    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    
    $(function(){
      // start datatable ----------------------------------------------
      var oTable;
    
      oTable = $('#tbl-patient-list').DataTable({

            language: { search: "" },
            dom:    "<'row'<'col-sm-12 col-xs-12'f>>",
            pageLength : 8,
            ajax: { "url" : "<?php echo base_url(); ?>patients/patient_list" },
            columnDefs: [
                {
                    "targets": [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 ],
                    "visible": false,
                    "searchable": false
                },
            ],
            fnDrawCallback: function() {
              var count_data = this.api().rows().count();
                $('#patient-data-count').html(count_data);
            },
      });

      $('#tbl-patient-list tbody').on( 'click', 'tr', function () {
          
          $('#tbl-patient-list tbody tr').removeClass('clicked');
          $(this).addClass('clicked');

          var data = oTable.row( this ).data();
          // pass data to patient information
          // patient number
          $('#patient-patient-number').html(data[1]);
          // add value to hidden input
          $('#patient-number-input').val(data[1]);
          // patient lastname
          $('#patient-lastname').val(data[2]);
          // patient firstname
          $('#patient-firstname').val(data[3]);
          // patient middlename
          $('#patient-middlename').val(titleCase(data[4]));
          // patient suffix
          $('#patient-suffix').val(data[5]);
          // patient birthdate
          $('#patient-birthdate').val(data[6]);
          // patient age - calculate from birthdate
          var birthdate = new Date(data[6]);

          if( data[6] == '0000-00-00' ){
            $('#patient-age').val('');
          }else{
            var ageDifMs = Date.now() - birthdate.getTime();
            var ageDate = new Date(ageDifMs); // miliseconds from epoch
            $('#patient-age').val(Math.abs(ageDate.getUTCFullYear() - 1970));
          }
          // patient gender
          $('#patient-gender').val(data[7]);
          // patient-height
          $('#patient-height').val(data[8]);
          // patient-weight 
          $('#patient-weight').val(data[9]);
          // patient-blood-type
          $('#patient-blood-type').val(titleCase(data[10]));
          // patient civil status
          $('#patient-civil-status').val(data[11]);
          // patient patient-email
          $('#patient-email').val(data[12]);
          // patient patient-citizenship
          $('#patient-citizenship').val(data[13]);
          // patient patient-contact-number
          $('#patient-contact-number').val(data[14]);
          // patient patient-address
          $('#patient-address').html(titleCase(data[15]));


          show_laboratory('show-patient-laboratory', data[1]);
          show_diagnosis('show-patient-diagnosis', data[1]);
      });
      // end datatable ----------------------------------------------

      $(document).on('change', '#patient-birthdate', function(event){
          event.preventDefault();

          var birthdate = new Date(this.value);
          var ageDifMs = Date.now() - birthdate.getTime();
          var ageDate = new Date(ageDifMs); // miliseconds from epoch
          $('#patient-age').val(Math.abs(ageDate.getUTCFullYear() - 1970));
      });

      $(document).on('submit', '#frm-patient', function(event){
        event.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        var posting = $.post( url, form.serializeArray() );

        posting.done(function(response){

          if( response > 0){
            $.notify("Changes has been saved", "success");
            oTable.ajax.reload();
          }else{
             $.notify("Something Went Wrong", "warn");
          }
          
          $('#patient-patient-number').html('000');
          // set hidden input (patient_id) to null value
          $('#patient-number-input').val('');
          var form = $('#frm-patient');
          form[0].reset();
        });
      });

      $(document).on('click', '#btn-clear-patient', function(event){
        event.preventDefault();

        $('#patient-patient-number').html('000');
        // set hidden input (patient_id) to null value
        $('#patient-number-input').val('');
        $('#patient-address').text('');
        var form = $('#frm-patient');
        form[0].reset();

        $('#show-patient-laboratory').html('');
        $('#show-patient-diagnosis').html('');
      });
  
      
    });

</script>
