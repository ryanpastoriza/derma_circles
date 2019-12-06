<div class="content-wrapper">

  <section class="content">
  
    <div class="row">
      
    <div class="col-sm-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Stocks</a></li>
          <li><a href="#tab_2" data-toggle="tab">Stock Entry</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
              <div class="col-sm-12">
                <?php $this->load->view('inventory/stocks/add_stocks'); ?>  
              </div>
             
             <div class="col-sm-12">
               <div id="stock-list">
                  <?php $this->load->view('inventory/stocks/stock_list'); ?>
               </div>
             </div> 
           </div>
         
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
              <?php $this->load->view('inventory/stocks/stock_entry'); ?>
          </div>
        </div>

      </div>

    </div>


      <div class="col-sm-4">
       
      </div>  

      <div class="col-sm-8">
       
      </div>
      
    </div>
   
  </section>

</div>


<script type="text/javascript">
  
  $(function(){

    $(document).on('submit', '#frm-add-stocks', function(e){
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
              $('#frm-add-stocks')[0].reset();
              sTable.ajax.reload();
              seTable.ajax.reload();
              $.notify('Transaction has been processed','success');
            }else{
             $.notify('Something went wrong!','warn');
            }
            
          });
    });

    $(document).on('click', '#btn-clear-stock', function(e){
      e.preventDefault();

      var form = $('#frm-add-stocks');
      form[0].reset();

    });


    var sTable = $('#tbl-stock-list').DataTable({
      ajax: { "url" : "<?php echo base_url(); ?>inventory/get_stock_list" },
    });

    var seTable = $('#tbl-stock-entry').DataTable({
      ajax: { "url" : "<?php echo base_url(); ?>inventory/get_stock_entry" },
      "autoWidth": false
    });

  });


</script>

