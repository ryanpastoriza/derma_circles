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
          Patient Name: <span id=""></span>
        </div>
        <div class="col-sm-6">
          Status: <span id=""></span>
        </div>
      </div>
   
      <div class="col-sm-12 spacer-sm">
        <div class="col-sm-6">
          Billing Date: <?php echo date('F d, Y').' - '.date('g:i a');?>
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
      <div class="col-sm-12 spacer-lg">
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
      </div>

      <div class="col-sm-12">
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
                $total = 0;
              ?>
              <?php foreach ($billing as $key => $value) : ?>
              <tr class="row-data">
                <?php
                  $total += $value->price;
                ?>
                <td><?= $value->service_name ?></td>
                <td class="text-right price"><?= number_format($value->price, 2); ?> </td>
                <td>
                  <div class="input-group">
                     <select class="form-control input-sm service-discount">
                      <option></option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
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
               <div class="col-sm-6">
                
               </div>
               <div class="col-sm-6">
                 <div class="input-group">
                  <span class="input-group-addon">Total</span>
                  <input type="text" class="form-control total" style="text-align: right; " id="total-amount" value="<?= number_format($total, 2); ?>">
                </div>
                <span></span>
               </div>
             </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 spacer-sm ">
        <div class="col-sm-12 text-right">
           <div class="col-sm-6 col-sm-offset-6">
             <div class="col-sm-6 text-right">
              <!--  Payment -->
             </div>
             <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">Payment</span>
                <input type="text" class="form-control">
              </div>
             </div>
           </div>
        </div>
      </div>

      <div class="col-sm-12 spacer-md ">
        <div class="col-sm-12 text-right">
           <div class="col-sm-6 col-sm-offset-6 text-right">
              <button class="btn btn-success">Add Payment</button>
           </div>
        </div>
      </div>

  </div>
  <!-- /.box-body -->
</div>


<script type="text/javascript">
  
  $(function(){

  });
  

</script>
