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


<script type="text/javascript">
  
  $(function(){


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

    // $(document).on('click', '.edit-diagnosis-exam', function(event) {
    //     event.preventDefault();

    //     storedFiles = [];
    //     var modal = $('#modal-patient-diagnosis-treatment-edit');

    //     var diagnosis_id = $(this).parent().data('id');
    //     var diagnosis = $(this).closest('tr').find('td').eq(1).text();
    //     var treatment = $(this).closest('tr').find('td').eq(2).text();
    //     var disposition = $(this).closest('tr').find('td').eq(3).text();

    //     modal.modal('show');
    //     modal.find('textarea[name=diagnosis]').text(diagnosis);
    //     modal.find('textarea[name=treatment]').text(treatment);
    //     modal.find('textarea[name=disposition]').text(disposition);
    //     modal.find('input[name=diagnosis_id]').val(diagnosis_id);

    //     var url = '<?php //echo base_url(); ?>patients/get_diag_images';
    //     var posting = $.post(url, { "diagnosis_id" : diagnosis_id } );
    //         posting.done(function(response){

    //           modal.find('#diagnosis-images').html(response);
              
    //         });
    // });


    // $(document).on('click', '.remove-diagnosis-image', function(event){
    //   event.preventDefault();

    //   var element = $(this);
    //   var image = $(this).parent().find('img').data('path');
    //   var url = '<?php //echo base_url(); ?>patients/remove_image';
   
    //   var posting = $.post(url, {'image': image} );
    //     posting.done(function(response){

    //         if( response > 0 ){
    //           element.parent().parent().remove();
    //           console.log(response);  
    //         }

            
    //     });
    // });

  });

  function show_diagnosis(element, id) {
    $('#' + element).html('');
    var url = "<?php echo base_url(); ?>/patients/show_diagnosis/" + id;
    $('#' + element).load(url);
  }



</script>