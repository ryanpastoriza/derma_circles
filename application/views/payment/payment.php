<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      
  <div class="row">
      
       <div class="col-sm-12">
          
        <div class="box box-solid">

          <div class="box-header with-border">
            <h3 class="box-title">Filters</h3>
          </div>

          <div class="box-body">
              
            <div class="col-sm-6">

              <div class="form-group">
                        
                <label for="">Patient:</label>
                <input type="text" id="patient-name" list="patient-list" class="form-control" placeholder="Patient Name" required>
                <datalist id="patient-list">
                  <?php foreach ($patients as $key => $value) : ?>
                    <option value="<?= ucwords($value->firstname.' '.$value->middlename[0].'. '.$value->lastname.' '.$value->suffix); ?>" data-id="<?= $value->patient_id; ?>">
                          
                    </option> 
                  <?php endforeach; ?>
                  
                </datalist>
              </div>

            </div>
            <div class="col-sm-6">
              
               <div class="form-group">
                        
                <label for="">Transaction Date:</label>
                <input type="date" name="" class="form-control" value="<?= date('Y-m-d'); ?>" id="dt-transaction-date">
              </div>

            </div>

            <div class="col-sm-12">
              <button class="btn btn-primary" id="btn-filter-billing"> Go </button>
            </div>

          </div>
        </div>

      </div>

      <div class="col-sm-12">
        <div id="show-billing-information"></div>
      </div>


  </div>



  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
    
    $(function(){

      $(document).on('click', '#btn-filter-billing', function(e){
        e.preventDefault();

        var name              = $('#patient-name').val();
        var patient_id        = $('#patient-list').find('option[value="' + name + '"]').attr('data-id');
        var transaction_date  = $('#dt-transaction-date').val();

        show_billing_information(patient_id, transaction_date);

      });


      $(document).on('change', '.service-discount', function(){

        var parent = $(this).closest('tr');

        var price = parent.find('.price').text();
        var discount = $(this).val();
        var amount = price - ((discount/100) * price);
        // (price * ()) + price;
        // alert($(this).val());
        parent.find('.subtotal').text(amount);

        total();
        
      });

      total();
    });

    function total() {

      var total = 0;

      $('.row-data .subtotal').each(function(k, v){
        total += parseFloat($(v).text());
        // console.log($(v).text());
      });

      $('#total-amount').val(total);

    }

    function show_billing_information(patient_id, transaction_date) {

        $('#show-billing-information').html('');
        var url = '<?php echo base_url('payment/billing_information/'); ?>' + patient_id + '/' + transaction_date;
        var posting = $.post(url);
          posting.done(function(response){
             $('#show-billing-information').html(response);    
          });

    }


</script>
