<div class="content-wrapper">

  <section class="content">
  
    <div class="row">
      
      <div class="col-sm-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Stock Transfer</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <?php $this->load->view('inventory/stock_transfer/transfer_stocks'); ?>
              <?php $this->load->view('inventory/stock_transfer/stock_transfer_list'); ?>
            </div>
            <!-- /.tab-pane -->
          </div>

        </div>

      </div>

    </div>
   
  </section>

</div>


<script type="text/javascript">
  
  $(function(){


    $(document).on('submit', '#frm-transfer-stocks', function(e){
      e.preventDefault();

      var form = $(this).serializeArray();
      var url = $(this).attr('action');
      var name   = $('#product-name').val();
      var product_id = $('#product-list').find('option[value="' + name + '"]').attr('data-id');

       if( product_id == undefined){
        alert('product not found!');
        return false;
      }

      form.push({ 'name' : 'product_id', 'value': product_id });


       var posting = $.post(url, form)
          posting.done(function(data){
            console.log(data);
            if( data > 0 ){
              $('#frm-transfer-stocks')[0].reset();
              // sTable.ajax.reload();
              // seTable.ajax.reload();
              $.notify('Transaction has been processed','success');
            }else{
             $.notify('Something went wrong!','warn');
            }
            
          });
      

    });


  });


</script>
