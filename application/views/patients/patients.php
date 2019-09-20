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
        <div class="nav-tabs-custom" style="min-height: 300px;">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#lab_exam" data-toggle="tab">Laboratory Exam</a></li>
            <li><a href="#diagnosis" data-toggle="tab">Treatment and Diagnosis</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="lab_exam">
              <div id="show-patient-laboratory"></div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="diagnosis">
              <div id="show-patient-diagnosis"></div>
            </div>
            <!-- /.tab-pane -->
          </div>
        <!-- /.tab-content -->
        </div>
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
        var form = $('#frm-patient');
        form[0].reset();

        $('#show-patient-laboratory').html('');
        $('#show-patient-diagnosis').html('');
      });

      // show_laboratory('show-patient-laboratory');
      // show_diagnosis('show-patient-diagnosis');
      // patient laboratory
      $(document).on('click', '#btn-laboratory-modal', function(event){
        event.preventDefault();

        var patient_id =$('#patient-patient-number').html();

        if( patient_id > 0 ){
          $('#modal-patient-laboratory-exam').modal('show');
        }else{
           $.notify("You need to select a patient!", "warn");
        }
      });


      var storedFiles = [];
      $(document).on('submit', '#frm-patient-laboratory', function(event){

        event.preventDefault();

        var form = $(this);
        var formData = handleUpload(event, storedFiles);
              
        var parameters = form.serializeArray();
        var patient_id = $('#patient-patient-number').html();

        parameters.push({name : "patient_id", value : patient_id});

        var url = form.attr('action');
        var posting = $.post( url, parameters );

        posting.done(function(response){
           
            if( response > 0){
              
              $.ajax({
                url: '<?php echo base_url(); ?>' + 'patients/patient_uploads/' + patient_id + '/' + response + '/laboratory' ,
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function(response){
                  console.log(response);
                }
              });

              $.notify("Transaction has been saved!", "success");
              $('#modal-patient-laboratory-exam').modal('hide');
              show_laboratory('show-patient-laboratory', patient_id);

            }else{
               $.notify("Something Went Wrong", "warn");
            }

        });
      });

      // file uploads
      if( window.File && window.FileList && window.FileReader ){

        $(document).on('click', '#files', function(e){
           $('#files').val('');
           storedFiles = [];

           $('.pip').each(function(){
            $(this).remove();
           });
        });

        $(document).on('change', '#files', function(e){
            
            var files = e.target.files;
            // var fLength = files.length;
            var filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function(f){

              if(!f.type.match("image.*")) {
                return;
              }

              storedFiles.push(f);

              var fr = new FileReader();
              fr.onload = (function(e){
                var file = e.target;
                
                $('<span class="pip"> ' + 
                  '<img class="imageThumb" data-file=" '+ f.name +' " src="'+ e.target.result +'" title="'+ f.name +'" ' +
                  '<br /><span class="remove">Remove</span>' +
                '</span>').insertAfter('#files');
              });

              fr.readAsDataURL(f);
            })
        });

        $(document).on('click', '.remove', function(e){
          
          var file = $(this).parent().find('img').data('file');
          for(var i=0;i<storedFiles.length;i++) {
            if(storedFiles[i].name.trim() == file.trim()) {
                storedFiles.splice(i,1);
                break;
            }
          }

          if( storedFiles.length <= 0 ){
            $('#files').val('');
          }

          $(this).parent(".pip").remove();
        });

      }else{
        alert("Your browser doesn't support to File API");
      }

      $(document).on('click', '.edit-laboratory-exam', function(event) {
        event.preventDefault();

        var modal = $('#modal-patient-laboratory-exam-edit');

        var laboratory_id = $(this).parent().data('id');
        var exam_type = $(this).closest('tr').find('td').eq(1).text();
        var results = $(this).closest('tr').find('td').eq(2).text();
        var remarks = $(this).closest('tr').find('td').eq(3).text();

        modal.modal('show');
        modal.find('input[name=exam_type]').val(exam_type);
        modal.find('#lab-edit-results').text(results);
        modal.find('#lab-edit-remarks').text(remarks);
        modal.find('input[name=laboratory_id]').val(laboratory_id);

        var url = '<?php echo base_url(); ?>patients/get_lab_images';
        var posting = $.post(url, { "laboratory_id" : laboratory_id } );
            posting.done(function(response){

              modal.find('#laboratory-images').html(response);
              
            });
      });

      $(document).on('submit', '#frm-patient-laboratory-edit', function(event){
        event.preventDefault();

        var form = $(this);
        
        var url = form.attr('action');
        var parameters = form.serializeArray();
        var patient_id = parameters[0].value;
        
        var posting = $.post( url, parameters );
            
            posting.done(function(response){  
              console.log(response);
              if( response > 0 ){
                $.notify("Transaction has been updated!", "success");
                $('#modal-patient-laboratory-exam-edit').modal('hide');
                show_laboratory('show-patient-laboratory', patient_id);
              }else{
                 $.notify("Something Went Wrong", "warn");
              }

            });
      });


      $(document).on('click', '.remove-laboratory-image', function(event){
        event.preventDefault();

        var type = 'laboratory';
        var patient_id = $(this).parent().find('img').data('patient_id');
        var id = $(this).parent().find('img').data('id');
        
        var path = 'assets/uploads/patients/' + patient_id + '/' + type + '/' + id;

        // var posting = 
        


        // console.log(patient_id);
        // console.log(id);
      });

      // ---------------------------------------------------
  
      // patient diagnosis
      $(document).on('click', '#btn-diagnosis-modal', function(event){
        event.preventDefault();

        var patient_id =$('#patient-patient-number').html();

        if( patient_id > 0 ){
          $('#modal-patient-diagnosis-treatment').modal('show');
        }else{
           $.notify("You need to select a patient!", "warn");
        }
      });

      $(document).on('submit', '#frm-patient-diagnosis', function(event){
        event.preventDefault();

          var form = $(this);
          var parameters = form.serializeArray();
          var patient_id = $('#patient-patient-number').html();

          parameters.push({name : "patient_id", value : patient_id});

          var url = form.attr('action');
          var posting = $.post( url, parameters );

          posting.done(function(response){

              if( response > 0){
                $.notify("Transaction has been saved!", "success");
                $('#modal-patient-diagnosis-treatment').modal('hide');
                show_diagnosis('show-patient-diagnosis', patient_id);
              }else{
                 $.notify("Something Went Wrong", "warn");
              }

          });
      });
      
    });

    function show_laboratory(element, id) {

      $('#' + element).html('');
      var url = "<?php echo base_url(); ?>/patients/show_laboratory/" + id;
      $('#' + element).load(url);
    }

    function show_diagnosis(element, id) {

      $('#' + element).html('');
      var url = "<?php echo base_url(); ?>/patients/show_diagnosis/" + id;
      $('#' + element).load(url);
    }

   function handleUpload(e, sf){
    e.preventDefault();

    var formData = new FormData(); 
    var files = $('#files')[0].files; 
    
    console.log(sf);
    for (var i = 0; i < sf.length; i++) {
     var file = sf[i];
   
     // Check the file type.
     if (!file.type.match('image.*')) {
       continue;
     }
   
     // Add the file to the request.
     formData.append('laboratory_files[]', file);
    }
    return formData;
   }

</script>
