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

  .remove-laboratory-image, .remove-diagnosis-image {
    cursor: pointer;
    font-weight: bold;
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

       <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_patient_information" data-toggle="tab">Personal Information</a></li>
            <li><a href="#tab_diagnosis" data-toggle="tab">Diagnosis</a></li>
            <li><a href="#tab_treatment" data-toggle="tab">Treatment</a></li>
            <li><a href="#tab_laboratory" data-toggle="tab">Laboratory</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-gear"></i> Options <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="trigger-medical-cert-modal">Medical Certificate</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_patient_information">
              <?php $this->load->view('patients/patient_information'); ?>
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
              <?php //$this->load->view('patients/laboratory'); ?>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      
      </div>
      <!-- end patient list and information -->
    </div>
    

    <!-- patient laboratory and diagnosis -->
    <div class="row">

      <div class="col-sm-12">
        <?php //$this->load->view('patients/laboratory_and_treatment'); ?>
      </div>

    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<div class="modal" id="modal-take-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <div class="row">
          <div class="col-sm-12 text-center">
            <div class="cam-content" style="border: 1px solid #CCC; background-color: #f1f1f1;">
                <video id="video" width="405" height="300" autoplay></video>
                <canvas id="canvas" width="405" height="300">
            </div>
                       
            <div class="cam-buttons">
                <button id="snap" class="btn btn-default btn-flat"> <i class="fa fa-camera"></i> <small>Capture</small> </button> 
                <button id="reset" class="btn btn-default btn-flat" style="display:none;"> <i class="fa fa-refresh"></i> <small>Reset</small> </button>
                <button id="save-photo" class="btn btn-default btn-flat"> <i class="fa fa-save"></i> <small>Save</small> </button> 
             </div>
           </div>
        </div>
      </div>
    </div>
  </div>
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

<div class="modal" id="modal-medical-certificate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Medical Certificate</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          
          <div class="col-sm-12">
            <div class="form-group">
              <label>Patient</label>
              <input type="text" class="form-control" id="medical-certificate-name">
            </div>
          </div>

          <div class="col-sm-12">
            <div class="form-group">
              <label>Address</label>
              <textarea id="medical-certificate-address" class="form-control" rows="3" style="resize: none;"></textarea>
            </div>
          </div>

           <div class="col-sm-12">
            <div class="form-group">
              <label>Date Examined/Treated</label>
              <input type="date" value="<?= date('Y-m-d'); ?>" id="medical-certificate-date" class="form-control">
            </div>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-medical-certificate">Preview</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    $(function(){

      // take photo
      var snapshot; 

      $(document).on('click', '#btn-take-photo', function(e){
        event.preventDefault();

        $('#modal-take-photo').modal('show');
        snapshot = new Snapshot('video', 'canvas');
      });

      $(document).on('click', '#snap', function(e){
        e.preventDefault();
        snapshot.capture('#video', '#canvas', '#snap', '#reset');
      });

      $(document).on('click', '#reset', function(e){
        e.preventDefault();
        snapshot.reset('#video', '#canvas', '#snap', '#reset'); 
      });

      $(document).on('click', '#save-photo', function(event){
        event.preventDefault();

        var patient_id = $('#patient-patient-number').html();
        
        var url = '<?php echo base_url(); ?>patients/save_photo/' + patient_id;
        snapshot.save(url);
        snapshot.close('#modal-take-photo');

        show_profile_pic('#patient-photo', patient_id);
      });

      // end take photo ---------------------------------------------------------------

      $(document).on('click', '#trigger-medical-cert-modal', function(event){

        var modal = $('#modal-medical-certificate');

        modal.modal('show');

        var firstname = $('#patient-firstname').val();
        var middlename = $('#patient-middlename').val().charAt(0);
        var lastname = $('#patient-lastname').val();
        var address = $('#patient-address').html();

        var fullname = '';
        if( firstname.length > 0 ){
          fullname = titleCase(firstname + ' ' + middlename + '. ' + lastname);
        }

        modal.find('#medical-certificate-name').val( fullname );
        modal.find('#medical-certificate-address').text(address);
      });


      $(document).on('click', '#btn-medical-certificate', function(event) {
        event.preventDefault();

        var patient = $('#medical-certificate-name').val()
        var address = $('#medical-certificate-address').text();
        var date_examined = $('#medical-certificate-date').val();

        var url = "<?php echo base_url().'patients/medical_certificate/'; ?>";

        var posting = $.post(url, { patient: patient, address: address, date_examined : date_examined });

          posting.done(function(response){
            console.log(response);
            window.open(url, '_blank');
          });
      });
      // start datatable ----------------------------------------------
      var oTable;
    
      oTable = $('#tbl-patient-list').DataTable({

            // language: { search: "" },
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
          $('#btn-take-photo').removeAttr('disabled');

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
          // // patient gender
          $('#patient-gender').val(data[7]);
          // patient-height
          $('#patient-height').val(data[8]);
          // patient-weight 
          $('#patient-weight').val(data[9]);
          // patient-blood-type
          $('#patient-blood-type').val(data[10]);
          // patient civil status
          $('#patient-civil-status').val(data[11]);
          // // patient patient-email
          $('#patient-email').val(data[12]);
          // patient patient-citizenship
          $('#patient-citizenship').val(data[13]);
          // patient patient-contact-number
          $('#patient-contact-number').val(data[14]);
          // patient patient-address
          $('#patient-address').html(titleCase(data[15]));

          show_laboratory('show-patient-laboratory', data[1]);
          show_diagnosis('show-patient-diagnosis', data[1]);
          show_treatment('show-patient-treatment', data[1]);
          show_profile_pic('#patient-photo', data[1]);
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
        $('#btn-take-photo').attr('disabled', true);
        $('#patient-patient-number').html('000');
        // set hidden input (patient_id) to null value
        $('#patient-number-input').val('');
        $('#patient-address').text('');
        var form = $('#frm-patient');
        form[0].reset();

        $('#show-patient-laboratory').html('');
        $('#show-patient-diagnosis').html('');
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
                      console.log(response);
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
                      console.log(response);
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

        console.log()
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
                console.log(response);  
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
                      console.log(response);
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
                console.log(response);  
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

        // remove from file upload
        $(document).on('click', '.remove', function(e){
            
            var file = $(this).parent().find('img').data('file');
            for(var i=0;i<storedFiles.length;i++) {
              if(storedFiles[i].name.trim() == file.trim()) {
                  storedFiles.splice(i,1);
                  break;
              }
            }

            if( storedFiles.length <= 0 ){
              $(this).parent().parent().find('input[type=file]').val('');
            }
            console.log(storedFiles);
            $(this).parent(".pip").remove();
        });

      }else{
          alert("Your browser doesn't support File API");
      }

      // capture image
      function Snapshot (v, c) {
        // Grab elements, create settings, etc.
        this.video = document.getElementById(v);
        this.canvas = document.getElementById(c);
        this.context = this.canvas.getContext('2d');
        this.dataUrl = '';
        this.localStream = null;
        // console.log(this.video);
        // Get access to the camera!
        if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Not adding `{ audio: true }` since we only want video now
            navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {

                video.srcObject = stream;
                video.play();
            });
        }
      }

      Snapshot.prototype.capture = function(v, c, s, r){

          this.context.drawImage(this.video, 0, 0, 405, 300);
          this.dataUrl = this.canvas.toDataURL();

          $(v).fadeOut(100);
          $(c).fadeIn(100);
          $(s).hide();
          $(r).show();
      };

      Snapshot.prototype.save = function(loc){
        // return this.dataUrl;
        console.log(loc);
        var data = this.dataUrl;
        $.ajax({
          type: "POST",
          url: loc,
          data: { 
             imgBase64: data
          }
        }).done(function(o) {
          console.log(o);
        });
      };

      Snapshot.prototype.close = function(elem) {

        this.video.pause();
        this.video.src = '';
        this.video.srcObject.getTracks()[0].stop();
        $(elem).modal('hide');

      };

      Snapshot.prototype.reset = function(v, c, s, r){

          $(v).fadeIn(100);
          $(c).fadeOut(100);
          $(s).show();
          $(r).hide();
      };

      window.Snapshot = Snapshot;
    
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

    function show_treatment(element, id){
        $('#' + element).html('');
        var url = "<?php echo base_url(); ?>/patients/show_treatment/" + id;
        $('#' + element).load(url);
    }

    function handleUpload(e, storedFiles, elem){
      e.preventDefault();

      var formData = new FormData(); 
      var files = $(elem)[0].files; 

      console.log(storedFiles);
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
        // alert(response);
         $(elem).attr('src', response);
          // '<?php //echo base_url('assets/uploads/patients'); ?>/' + patient_id + '/profile.png');

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
