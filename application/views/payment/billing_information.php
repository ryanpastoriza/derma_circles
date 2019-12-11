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
          Status: <span class="label bg-red" id="">unpaid</span>
        </div>
      </div>
   
      <div class="col-sm-12 spacer-sm">
        <div class="col-sm-6">
          Billing Date: <?php 

            if( isset($check) && count($check) > 0 ){
              echo date('F d, Y', strtotime($check[0]->date_created));
            }

            

          ?>
        </div>
        <div class="col-sm-6">
          Mode of Payment: Cash
        </div>
      </div>

     <!--  <div class="col-sm-12 spacer-sm">
        <div class="col-sm-12">
          Practitioner
        </div>
      </div>
     -->

  <!--     <div class="col-sm-12 spacer-lg">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Particulars</label>
            <div class="input-group">
               <input type="text" class="form-control">
               <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Add</button>
               </span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Qty</label>
            <input type="number" value="1" class="form-control">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Unit</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Total</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div> -->

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
                // echo '<pre>';
                // var_export($billing);
                // echo '</pre>';
                $total = 0;
              ?>
              <?php foreach ($billing as $key => $value) : ?>
                <tr class="row-data" id="<?= $value->transaction_id; ?>">
                  <?php
                    $total += $value->price;
                  ?>
                  <td><?= $value->service_name ?></td>
                  <td class="text-right price"><?= number_format($value->price, 2); ?> </td>
                  <td>
                    <div class="input-group">
                       <select class="form-control input-sm service-discount">
                        <option value=""></option>
                        <option value="np">NP</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                   
                  </td>
                  <td class="text-right"><span class="subtotal"><?= number_format($value->price, 2); ?></span></td>
                  <!-- <td><i class="fa fa-remove text-red"></i></td> -->
                </tr>
                <?php endforeach; ?>

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
                  <input type="text" class="form-control total" style="text-align: right; " id="total-amount" value="<?= number_format($total, 2); ?>">
                </div>
                <span></span>
               </div>
             </div>
              
              <div class="col-sm-6 col-sm-offset-6 spacer-sm">
               <div class="col-sm-6 col-sm-offset-6">
                 <div class="input-group">
                  <span class="input-group-addon">Payment</span>
                  <input type="number" class="form-control" style="text-align: right; " id="total-payment">
                </div>
                <span></span>
               </div>
             </div>

             <div class="col-sm-6 col-sm-offset-6 spacer-sm">
               <div class="col-sm-6 col-sm-offset-6">
                 <div class="input-group">
                  <span class="input-group-addon">Change</span>
                  <input type="text" disabled class="form-control" style="text-align: right; " id="txt-change">
                </div>
                <span></span>
               </div>
             </div>

          </div>
        </div>
      </div>

      <div class="col-sm-12 text-right spacer-md">
        <div class="col-sm-12">
          <div class="col-sm-12">
            <button class="btn btn-primary" id="btn-add-payment" <?php echo (count($billing) > 0) ? '' : 'disabled'; ?> >Save Transaction</button>
          </div>
        </div>
      </div>

  </div>
</div>
  