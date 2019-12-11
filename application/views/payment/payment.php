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


<div class="modal" id="add-payment-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        
        <div class="row">
          
          <div class="col-sm-12">
           <h1>Error!</h1>
          </div>

        </div>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
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

        // console.log(transaction_date);
        show_billing_information(patient_id, transaction_date);

      });


      $(document).on('keyup', '#total-payment', function() {

        var payment = 0;
        var total = 0;
        var change = 0;

        if( this.value != null && this.value.length > 0){
          payment = parseInt(this.value);
        }else{
           $('#txt-change').val(0);
           return false;
        }
        
        total = parseFloat($('#total-amount').val().replace(',', ''));
        change = parseFloat(payment - total);

        $('#txt-change').val(numberWithCommas(change.toFixed(2)));

      });

      $(document).on('click', '#btn-add-payment', function(e){
        e.preventDefault();

        var total   = parseFloat($('#total-amount').val().replace(',', ''));
        var payment = $('#total-payment').val();
        var billing_date = $('#dt-transaction-date').val();


        if( payment == null || payment.length < 1 ){
          payment = 0
        }else{
          payment = parseInt($('#total-payment').val()); 
        }

        // check if there is a payment.
        if( payment < total) {
           $.notify("Payment must not be lesser than total payable!", "warn");
          // $('#add-payment-modal').modal('show');
          return false;
        }

        // console.log(payment);
        var billing_service_transaction = [];
        var billing = [];

        billing.push({ 'total' : total, 'billing_date' : billing_date, 'payment' : payment, 'status' : 'paid' });

        // get discount per specifics - transaction_id and discount
        $('.service-discount').each(function(k, v){

          var transaction_id = $(this).closest('tr').attr('id');
          var discount = $(v).val();
          var subtotal = $(this).closest('tr').children('td:last-child').text();

          billing_service_transaction.push({ 'transaction_id' : transaction_id, 'discount' : discount, 'subtotal' : subtotal });

        });

        // console.log(billing_service_transaction);
        // console.log(billing);


        var url  = '<?php echo base_url('payment/add_payment'); ?>';
        var data = { 'billing_service_transaction' : billing_service_transaction, 'billing' : billing };

        var posting = $.post(url, data);
            posting.done(function(response) {

              if( response > 0 ){
                $.notify("Transaction has been saved", "success");
                $('#btn-add-payment').attr('disabled', 'disabled');
              }else{
                $.notify("Something Went Wrong!", "warn");
              }
              
            });


        // var modal = $('#add-payment-modal');
        // modal.modal('show');

      });


      $(document).on('change', '.service-discount', function(){

        var parent = $(this).closest('tr');

        var price = parent.find('.price').text();
        var discount = $(this).val();


        var amount = 0;
        if( discount != 'np' ){
         amount = price - ((discount/100) * price);  
        }
        
        parent.find('.subtotal').text(amount.toFixed(2));
        
        total();
        
      });

      total();
    });

    function total() {

      var total = 0;

      $('.row-data .subtotal').each(function(k, v){
        total += parseFloat($(v).text());
      });

      $('#total-amount').val(numberWithCommas(total.toFixed(2)));
    }

    function show_billing_information(patient_id, transaction_date) {

        $('#show-billing-information').html('');
        var url = '<?php echo base_url('payment/billing_information/'); ?>' + patient_id + '/' + transaction_date;
        var posting = $.post(url);
          posting.done(function(response){
             $('#show-billing-information').html(response);    
          });

    }


    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>
