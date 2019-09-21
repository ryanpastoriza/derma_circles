 <style type="text/css">
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

    $(document).on('click', '.lab-item', function() {

      console.log()
      $('.imagepreview').attr('src', $(this).data('item'));
      $('#imagemodal').modal('show');   

    });

    var storedFiles = [];

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

    // file uploads
    if( window.File && window.FileList && window.FileReader ){

      $(document).on('click', '.laboratory-files', function(e){
        
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


    // ----------------------------------------------------------------------
    // diagnosis

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
                $('#modal-patient-diagnosis-treatment').modal('hide');
              }else{
                 $.notify("Something Went Wrong", "warn");
              }

          });
    });

     // file uploads
    if( window.File && window.FileList && window.FileReader ){

      $(document).on('click', '.diagnosis-files', function(e){
        
         $(this).val('');
         storedFiles = [];
         $('.pip').each(function(){
          $(this).remove();
         });
      });


      // show laboratory image
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

    }else{
        alert("Your browser doesn't support File API");
    }

    $(document).on('click', '.edit-diagnosis-exam', function(event) {
        event.preventDefault();

        var modal = $('#modal-patient-diagnosis-treatment-edit');

        var diagnosis_id = $(this).parent().data('id');
        var diagnosis = $(this).closest('tr').find('td').eq(1).text();
        var treatment = $(this).closest('tr').find('td').eq(2).text();
        var disposition = $(this).closest('tr').find('td').eq(3).text();

        modal.modal('show');
        modal.find('textarea[name=diagnosis]').text(diagnosis);
        modal.find('textarea[name=treatment]').text(treatment);
        modal.find('textarea[name=disposition]').text(disposition);
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

              console.log(response);
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
                $('#modal-patient-diagnosis-treatment-edit').modal('hide');
              }else{
                 $.notify("Something Went Wrong", "warn");
              }

          });
    });

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



</script>