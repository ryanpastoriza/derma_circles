<style type="text/css">
    
    .total {
      font-weight: bold;

    }

</style>

<div class="box box-solid">

  <div class="box-header with-border text-center">
    <h3 class="box-title">Billing Information</h3>
  </div>

  <div class="box-body">
      
      <div class="col-sm-12">
        <div class="col-sm-6">
          Patient Name: <span id=""><?= ucwords($patient->firstname.' '.$patient->middlename[0].'. '.$patient->lastname.' '.$patient->suffix); ?></span>
        </div>
        <div class="col-sm-6">
          Status: 
          
          <?php 
            if( isset($check) && count($check) > 0 ){
          ?>
              <span class="label bg-green" id="">paid</span>   
          <?php
            }else{
           ?>
              <span class="label bg-red" id="">unpaid</span>   
           <?php
            }
          ?>
         
        </div>
      </div>
   
      <div class="col-sm-12 spacer-sm">
        <div class="col-sm-6">
          Billing Date: 
          <?php 

            if( isset($check) && count($check) > 0 ){
              echo date('F d, Y', strtotime($check[0]->date_created));
            }
            
          ?>
        </div>
        <div class="col-sm-6">
          Mode of Payment: Cash
        </div>
      </div>

      <div class="col-sm-12 spacer-lg">
        <div class="col-sm-12">
          <table class="table table-bordered table-condensed">
            <thead>
              <tr>
                <th>Specifics</th>
                <th>Price</th>
                <th width="150">Discount</th>
                <th>Subtotal</th>
               <!--  <th></th> -->
              </tr>
            </thead>
            <tbody>
              <?php  
                $count = 0;
              ?>
              <?php foreach ($billing as $key => $value) : ?>
                <tr class="row-data" id="<?= $value->transaction_id; ?>">
                  <td><?= $value->service_name ?></td>
                  <td class="text-right"><?= number_format($value->price, 2); ?> </td>
                  <td class="text-right">
                    <?php echo $check[$count]->discount.'%'; ?>
                  </td>
                  <td class="text-right">
                    <span class="subtotal">
                       <?php echo $check[$count]->subtotal; ?>
                    </span>
                  </td>
                  <!-- <td><i class="fa fa-remove text-red"></i></td> -->
                </tr>
                <?php 
                  $count++;
                  endforeach; 
                  ?>

            </tbody>

          </table>
        </div>
      </div>

      <div class="col-sm-12 spacer-md ">
        <div class="row">
          <div class="col-sm-12 text-right">
             
             <div class="col-sm-6 col-sm-offset-6">
               <div class="col-sm-6 col-sm-offset-6">
                 <div class="input-group">
                  <span class="input-group-addon">Total</span>
                  <input type="text" class="form-control total" style="text-align: right; " value="<?php echo $check[0]->total; ?>">
                </div>
                <span></span>
               </div>
             </div>
              
              <div class="col-sm-6 col-sm-offset-6 spacer-sm">
               <div class="col-sm-6 col-sm-offset-6">
                 <div class="input-group">
                  <span class="input-group-addon">Payment</span>
                  <input type="number" class="form-control" style="text-align: right; " value="<?php echo $check[0]->payment; ?>">
                </div>
                <span></span>
               </div>
             </div>

          </div>
        </div>
      </div>

  </div>
</div>
  