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
