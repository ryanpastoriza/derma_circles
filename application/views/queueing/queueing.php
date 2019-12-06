<style type="text/css">
  
  #patient-patient-number {
    font-size: 100%;
  }

  @media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
  
  .cam-content{
    display: block;
    position: relative;
    overflow: hidden;
    height: 300px;
    margin: auto;
    }

  .cam-buttons button {
    margin-top: 5px;
  }

  input[type="file"] {
    display: block;
  }
  .imageThumb {
    max-width: 200px;
    border: 1px solid;
    padding: 1px;
    cursor: pointer;
  }
  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }
  .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }
  .remove:hover {
    background: white;
    color: black;
  }
  
  ul.lab-image-list {
    list-style: none;
  }

  .lab-image-list li {
    cursor: pointer;
  }

  .lab-image-list li:hover {
    color: #006dd9;
  }

  .remove-laboratory-image, .remove-diagnosis-image, .remove-image {
    cursor: pointer;
    font-weight: bold;
  }
  
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
              <i class="fa fa-fast-forward text-blue"></i> Add to Queue
            </a>

            <a class="btn btn-app" data-toggle="modal" data-target="#modal-patient-confirm-reset-queue">
              <i class="fa fa-repeat text-red"></i> Reset Queue
            </a>

          </div>

          <div class="col-sm-12 spacer-sm">
              <?php $this->load->view('queueing/patient_queue'); ?>
          </div>

        </div>

      </div>

      <div class="col-sm-9">
         
          <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_patient_information" data-toggle="tab">Personal Information</a></li>
            <li><a href="#tab_diagnosis" data-toggle="tab">Diagnosis</a></li>
            <li><a href="#tab_treatment" data-toggle="tab">Treatment</a></li>
            <li><a href="#tab_laboratory" data-toggle="tab">Laboratory</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_patient_information">
                <?php $this->load->view('queueing/patient_information'); ?>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_diagnosis">
               <div id="show-patient-diagnosis"></div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_treatment">
              <div id="show-patient-treatment"></div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_laboratory">
               <div id="show-patient-laboratory"></div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->

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
                  <th>Patient Name</th>
                  <th>Gender</th>
                  <th>Contact Number</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($patient_info as $key => $value) : ?>
                <tr>
                  <td><?= $value->patient_id; ?></td>
                  <td><?= ucwords($value->lastname.', '.$value->firstname.' '.$value->middlename[0].'. '.$value->suffix); ?></td>
                  <td><?= ucwords($value->gender); ?></td>
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


<!-- modal for image  -->
<div class="modal" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">              
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
<!-- end modal for image -->

<script type="text/javascript">

  $(function(){

      var oTable;
      oTable = $('#tbl-queued-patient').DataTable({

        ajax: { "url" : "<?php echo base_url(); ?>queueing/get_patient_queueing" },
        dom:    "<'row'<'col-sm-12 col-xs-12'f>>",
        ordering: false,
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

      $(document).on('click', '#btn-reset-queue', function(event){
        event.preventDefault();

        var url = '<?php echo base_url().'queueing/reset_queue'; ?>';

        var posting = $.post(url);
           posting.done(function(response){

            $.notify("Reset Successful", "success");
            $('#modal-patient-confirm-reset-queue').modal('hide');
            oTable.clear().draw();

           });
      });

      // on click table - patient queueing
      $('#tbl-queued-patient tbody').on( 'click', 'tr', function () {

          $('#tbl-queued-patient tbody tr').removeClass('clicked');
          $(this).addClass('clicked');

          var data = oTable.row( this ).data();
          get_patient_information(data[0]);
          show_laboratory('show-patient-laboratory', data[0]);
          show_diagnosis('show-patient-diagnosis', data[0]);
          show_treatment('show-patient-treatment', data[0]);

      });

      // on finish consultation
      $(document).on('click', '#btn-done', function(event){
        event.preventDefault();

        var patient_id = $('#patient-patient-number').html();
        var url = "<?php echo base_url(); ?>/queueing/patient_checkout/";
        var posting = $.post(url, { patient_id : patient_id });
            posting.done(function(data){

              console.log(data);
              if( data > 0 ) {
                 oTable.ajax.reload();
                 $('#btn-clear').trigger('click');
              }else{
                $.notify("Something went wrong!", "warn");
              }
              
            });
      });
      // clear
      $(document).on('click', '#btn-clear', function(event){
        event.preventDefault();

        $('#btn-done').addClass('disabled');
        var form = $('#frm-patient');
        form[0].reset();
        $('#patient-patient-number').html('000');
        // set hidden input (patient_id) to null value
        $('#patient-number-input').val('');
        $('#patient-address').text('');


        $('#show-patient-laboratory').html('');
        $('#show-patient-diagnosis').html('');
        $('#show-patient-treatment').html('');
        $('#tbl-queued-patient tbody tr').removeClass('clicked');
        show_profile_pic('#patient-photo', 0);
      });


      // patient laboratory ----------------------------------------------------------------
      // call patient laboratory modal
      $(document).on('click', '#btn-laboratory-modal', function(event){
        event.preventDefault();

        var patient_id =$('#patient-patient-number').html();

        if( patient_id > 0 ){
          // call laboratory modal
          $('#modal-patient-laboratory-exam').modal('show');
        }else{
           $.notify("You need to select a patient!", "warn");
        }
      });
      // add patient laboratory
      $(document).on('submit', '#frm-patient-laboratory', function(event){

          event.preventDefault();
        
          var form = $(this);
          var formData = handleUpload(event, storedFiles, '#laboratory-files');
          var parameters = form.serializeArray();
          var patient_id = $('#patient-patient-number').html();

          parameters.push({name : "patient_id", value : patient_id});

          var url = form.attr('action');
          var posting = $.post( url, parameters );

          posting.done(function(response){
             
              if( response > 0){
                
                  $.ajax({
                    url: '<?php echo base_url(); ?>' + 'patients/laboratory_uploads/' + patient_id + '/' + response ,
                    data: formData,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function(response){
                      // console.log(response);
                      show_laboratory('show-patient-laboratory', patient_id);
                    }
                  });

                $.notify("Transaction has been saved!", "success");
                $('#modal-patient-laboratory-exam').modal('hide');
               

              }else{
                 $.notify("Something Went Wrong", "warn");
              }

          });
      });
      // show edit laboratory modal
      $(document).on('click', '.edit-laboratory-exam', function(event) {
          event.preventDefault();

          storedFiles = [];
          var modal = $('#modal-patient-laboratory-exam-edit');

          var laboratory_id = $(this).parent().data('id');
          var transaction_date = $(this).closest('tr').find('td').eq(0).text();
          var exam_type = $(this).closest('tr').find('td').eq(1).text();
          var results = $(this).closest('tr').find('td').eq(2).text();
          var remarks = $(this).closest('tr').find('td').eq(3).text();

          modal.modal('show');
          modal.find('input[name=transaction_date]').val(format_date(transaction_date));
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
      // edit laboratory exam
      $(document).on('submit', '#frm-patient-laboratory-edit', function(event){
          event.preventDefault();

          var form = $(this);

          var formData = handleUpload(event, storedFiles, '#edit-laboratory-files');
          var url = form.attr('action');
          var parameters = form.serializeArray();
          var patient_id = parameters[0].value;
          
          var posting = $.post( url, parameters );
              
              posting.done(function(response){  
                
                if( response > 0 ){

                  $.ajax({
                    url: '<?php echo base_url(); ?>' + 'patients/laboratory_uploads/' + patient_id + '/' + response ,
                    data: formData,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function(response){
                      // console.log(response);
                      show_laboratory('show-patient-laboratory', patient_id);
                    }
                  });


                  $.notify("Transaction has been updated!", "success");
                  $('#modal-patient-laboratory-exam-edit').modal('hide');
                  

                }else{

                   $.notify("Something Went Wrong", "warn");

                }

              });
      });
      // show images in a modal
      $(document).on('click', '.lab-item', function() {

        $('.imagepreview').attr('src', $(this).data('item'));
        $('#imagemodal').modal('show');   
      });
      // remove laboratory images
      $(document).on('click', '.remove-laboratory-image', function(event){
        event.preventDefault();

        var element = $(this);
        var image = $(this).parent().find('img').data('path');
        var url = '<?php echo base_url(); ?>patients/remove_image';
     
        var posting = $.post(url, {'image': image} );
          posting.done(function(response){

              if( response > 0 ){
                element.parent().parent().remove();
                // console.log(response);  
              }
          });
      });

      // patient diagnosis ---------------------------------------------------------
      // call patient diagnosis modal
      $(document).on('click', '#btn-diagnosis-modal', function(event){
        event.preventDefault();

        var patient_id =$('#patient-patient-number').html();

        if( patient_id > 0 ){
          // call laboratory modal
          $('#modal-patient-diagnosis').modal('show');
        }else{
           $.notify("You need to select a patient!", "warn");
        }
      });
      // add patient diagnosis
      $(document).on('submit', '#frm-patient-diagnosis', function(event){
        event.preventDefault();

        var form = $(this);
        var parameters = form.serializeArray();
        var formData = handleUpload(event, storedFiles, '#diagnosis-files');
        var patient_id = $('#patient-patient-number').html();

        parameters.push({name : "patient_id", value : patient_id});

        var url = form.attr('action');
        var posting = $.post( url, parameters );
          posting.done(function(response){

                if( response > 0){

                  $.ajax({
                    url: '<?php echo base_url(); ?>' + 'patients/diagnosis_uploads/' + patient_id + '/' + response,
                    data: formData,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function(response){
                      // console.log(response);
                    show_diagnosis('show-patient-diagnosis', patient_id);
                    }
                  });

                  $.notify("Transaction has been saved!", "success");
                  $('#modal-patient-diagnosis').modal('hide');
                }else{
                   $.notify("Something Went Wrong", "warn");
                }

            });
        // console.log(formData);
      });
      // show edit modal
      $(document).on('click', '.edit-diagnosis', function(event){
        event.preventDefault();

        storedFiles = [];
        var modal = $('#modal-patient-diagnosis-edit');

        modal.modal('show');
        var diagnosis_id = $(this).parent().data('id');
        var transaction_date = $(this).closest('tr').find('td').eq(0).text();
        var diagnosis = $(this).closest('tr').find('td').eq(1).text();

        modal.find('input[name=transaction_date]').val(format_date(transaction_date));
        modal.find('textarea[name=diagnosis]').text(diagnosis);
        modal.find('input[name=diagnosis_id]').val(diagnosis_id);

        var url = '<?php echo base_url(); ?>patients/get_diag_images';
        var posting = $.post(url, { "diagnosis_id" : diagnosis_id } );
              posting.done(function(response){

                modal.find('#diagnosis-images').html(response);
                
              });
      });
      $(document).on('submit', '#frm-patient-diagnosis-edit', function(event){
        event.preventDefault();

          var form = $(this);
          var parameters = form.serializeArray();
          var formData = handleUpload(event, storedFiles, '#edit-diagnosis-files');
          var patient_id = $('#patient-patient-number').html();

          parameters.push({name : "patient_id", value : patient_id});

          var url = form.attr('action');
          var posting = $.post( url, parameters );

          posting.done(function(response){

              
              if( response > 0){

                $.ajax({
                  url: '<?php echo base_url(); ?>' + 'patients/diagnosis_uploads/' + patient_id + '/' + response,
                  data: formData,
                  type: 'POST',
                  contentType: false,
                  processData: false,
                  success: function(response){
                    show_diagnosis('show-patient-diagnosis', patient_id);
                  }
                });

                $.notify("Transaction has been saved!", "success");
                $('#modal-patient-diagnosis-edit').modal('hide');
              }else{
                 $.notify("Something Went Wrong", "warn");
              }

          });
      });
      // remove diagnosis images
      $(document).on('click', '.remove-diagnosis-image', function(event){
        event.preventDefault();

        var element = $(this);
        var image = $(this).parent().find('img').data('path');
        var url = '<?php echo base_url(); ?>patients/remove_image';
     
        var posting = $.post(url, {'image': image} );
          posting.done(function(response){

              if( response > 0 ){
                element.parent().parent().remove();
                // console.log(response);  
              }

              
          });
      });
      // patient treatment
      $(document).on('click', '#btn-treatment-modal', function(event){
        event.preventDefault();

        var patient_id =$('#patient-patient-number').html();

        if( patient_id > 0 ){
          // call laboratory modal
          $('#modal-patient-treatment').modal('show');
        }else{
           $.notify("You need to select a patient!", "warn");
        }
      });
      $(document).on('submit', '#frm-patient-treatment', function(event){
        event.preventDefault();

        var form = $(this);
        var parameters = form.serializeArray();
        var formData = handleUpload(event, storedFiles, '#treatment-files');
        var patient_id = $('#patient-patient-number').html();

        parameters.push({name : "patient_id", value : patient_id});

        var url = form.attr('action');
        var posting = $.post( url, parameters );
            posting.done(function(response){

              // console.log(response);
              if( response > 0 ){

                $.ajax({
                  url: '<?php echo base_url(); ?>' + 'patients/treatment_uploads/' + patient_id + '/' + response,
                  data: formData,
                  type: 'POST',
                  contentType: false,
                  processData: false,
                  success: function(response){
                  show_treatment('show-patient-treatment', patient_id);
                  }
                });
                $.notify("Transaction has been saved!", "success");
                $('#modal-patient-treatment').modal('hide');
              }else{
                $.notify("Something Went Wrong", "warn");
              }

            });
      }); 
      $(document).on('click', '.edit-treatment', function(event){
        event.preventDefault();

        storedFiles = [];
        var modal = $('#modal-patient-treatment-edit');

        modal.modal('show');
        var treatment_id = $(this).parent().data('id');
        var transaction_date = $(this).closest('tr').find('td').eq(0).text();
        var treatment = $(this).closest('tr').find('td').eq(1).text();
        var disposition_date = $(this).closest('tr').find('td').eq(2).text();

        modal.find('input[name=transaction_date]').val(format_date(transaction_date));
        modal.find('textarea[name=treatment]').text(treatment);
        modal.find('input[name=disposition_date]').val(format_date(disposition_date));
        modal.find('input[name=treatment_id]').val(treatment_id);

        var url = '<?php echo base_url(); ?>patients/get_treatment_images';
        var posting = $.post(url, { "treatment_id" : treatment_id } );
              posting.done(function(response){
                modal.find('#treatment-images').html(response);
              });
      });
      $(document).on('submit', '#frm-patient-treatment-edit', function(event){
        event.preventDefault();

        var form = $(this);
        var parameters = form.serializeArray();
        var formData = handleUpload(event, storedFiles, '#treatment-files');
        var patient_id = $('#patient-patient-number').html();

        parameters.push({name : "patient_id", value : patient_id});

        var url = form.attr('action');
        var posting = $.post( url, parameters );
            posting.done(function(response){

              // console.log(response);
              if( response > 0 ){

                $.ajax({
                  url: '<?php echo base_url(); ?>' + 'patients/treatment_uploads/' + patient_id + '/' + response,
                  data: formData,
                  type: 'POST',
                  contentType: false,
                  processData: false,
                  success: function(response){
                  show_treatment('show-patient-treatment', patient_id);
                  }
                });
                $.notify("Transaction has been saved!", "success");
                $('#modal-patient-treatment-edit').modal('hide');
              }else{
                $.notify("Something Went Wrong", "warn");
              }

            });
      });
      // remove images
      $(document).on('click', '.remove-image', function(event){
        event.preventDefault();

        var element = $(this);
        var image = $(this).parent().find('img').data('path');
        var url = '<?php echo base_url(); ?>patients/remove_image';
     
        var posting = $.post(url, {'image': image} );
          posting.done(function(response){

              if( response > 0 ){
                element.parent().parent().remove();
                // console.log(response);  
              }
          });
      });




      // handles stored files for formdata image uploading
      var storedFiles = [];

      // file uploads
      if( window.File && window.FileList && window.FileReader ){

        // laboratory
        $(document).on('click', '.laboratory-files', function(e){
          
           $(this).val('');
           storedFiles = [];
           $('.pip').each(function(){
            $(this).remove();
           });
        });
        // diagnosis
        $(document).on('click', '.diagnosis-files', function(e){
        
           $(this).val('');
           storedFiles = [];
           $('.pip').each(function(){
            $(this).remove();
           });
        });

        // treatment
        $(document).on('click', '.treatment-files', function(e){
           $(this).val('');
           storedFiles = [];
           $('.pip').each(function(){
            $(this).remove();
           });
        });


        // show laboratory image
        $(document).on('change', '.laboratory-files', function(e){
            var parent = $(this);
            storedFiles = [];
            var files = e.target.files;
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
                '</span>').insertAfter(parent);
              });

              fr.readAsDataURL(f);
            });
        });
        // show diagnosis image
        $(document).on('change', '.diagnosis-files', function(e){
            var parent = $(this);
            storedFiles = [];
            var files = e.target.files;
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
                '</span>').insertAfter(parent);
              });

              fr.readAsDataURL(f);
            });
        });
        // show treatment image
        $(document).on('change', '.treatment-files', function(e){
          e.preventDefault();

          var parent = $(this);
            storedFiles = [];
            var files = e.target.files;
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
                '</span>').insertAfter(parent);
              });

              fr.readAsDataURL(f);
            });
        });

        // remove from file upload
        $(document).on('click', '.remove', function(e){
            
            var file = $(this).parent().find('img').data('file');
            for(var i=0;i<storedFiles.length;i++) {
              if(storedFiles[i].name.trim() == file.trim()) {
                  storedFiles.splice(i, 1);
                  break;
              }
            }

            if( storedFiles.length <= 0 ){
              $(this).parent().parent().find('input[type=file]').val('');
            }
            // console.log(storedFiles);
            $(this).parent(".pip").remove();
        });
      }else{
          alert("Your browser doesn't support File API");
      }
      
  }); 



  function get_patient_information(patient_id){
      
    var patient;
    var url = "<?php echo base_url(); ?>/queueing/get_patient/";
    var posting = $.post(url, { patient_id : patient_id  });
        posting.done(function(data){

            $('#btn-done').removeClass('disabled');
            patient = JSON.parse(data);

            $('#patient-patient-number').html(patient.patient_id);
            // add value to hidden input
            $('#patient-number-input').val(patient.patient_id);
            // patient lastname
            $('#patient-lastname').val(patient.lastname);
            // patient firstname
            $('#patient-firstname').val(patient.firstname);
            // patient middlename
            $('#patient-middlename').val(titleCase(patient.middlename));
            // patient suffix
            $('#patient-suffix').val(patient.suffix);
            // patient birthdate
            $('#patient-birthdate').val(patient.birthdate);
            // patient age - calculate from birthdate
            var birthdate = new Date(patient.birthdate);

            if( data[6] == '0000-00-00' ){
              $('#patient-age').val('');
            }else{
              var ageDifMs = Date.now() - birthdate.getTime();
              var ageDate = new Date(ageDifMs); // miliseconds from epoch
              $('#patient-age').val(Math.abs(ageDate.getUTCFullYear() - 1970));
            }
            // // patient gender
            $('#patient-gender').val(patient.gender);
            // patient-height
            $('#patient-height').val(patient.height);
            // patient-weight 
            $('#patient-weight').val(patient.weight);
            // patient-blood-type
            $('#patient-blood-type').val(patient.blood_type);
            // patient civil status
            $('#patient-civil-status').val(patient.civil_status);
            // // patient patient-email
            $('#patient-email').val(patient.email_address);
            // patient patient-citizenship
            $('#patient-citizenship').val(patient.citizenship);
            // patient patient-contact-number
            $('#patient-contact-number').val(patient.contact_number);
            // patient patient-address
            $('#patient-address').html(titleCase(patient.address));

        });
  }

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

  function show_treatment(element, id){
      $('#' + element).html('');
      var url = "<?php echo base_url(); ?>/patients/show_treatment/" + id;
      $('#' + element).load(url);
  }

    function handleUpload(e, storedFiles, elem){
    e.preventDefault();

    var formData = new FormData(); 
    var files = $(elem)[0].files; 

    // console.log(storedFiles);
    for (var i = 0; i < storedFiles.length; i++) {
     var file = storedFiles[i];

     // Check the file type.
     if (!file.type.match('image.*')) {
       continue;
     }

     // Add the file to the request.
     formData.append($(elem).attr('name'), file);
    }
    return formData;
  }

  function show_profile_pic(elem, patient_id) {

    var url = '<?php echo base_url().'patients/show_profile_picture' ?>';
    var posting = $.post(url, {patient_id: patient_id} );

    posting.done(function(response){
      // console.log(response);
       $(elem).attr('src', response);
    });
  }

  function format_date(date) {

    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

    return [year, month, day].join('-');
  }


</script>