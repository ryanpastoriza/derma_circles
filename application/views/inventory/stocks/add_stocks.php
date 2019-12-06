<div class="box box-solid">

  <div class="box-header with-border">
    <h3 class="box-title"> <i class="fa fa-plus"></i> Add Stocks</h3>
  </div>

  <div class="box-body">
    
    <div class="row">

      	<?= form_open(base_url().'inventory/add_stocks', ['id' => 'frm-add-stocks']); ?>
      	<input type="hidden" name="" value="0">
      	<div class="col-sm-4">
	    	<div class="form-group">
				<?php
					// echo '<pre>';
					// var_export($products);
					// echo '</pre>';

				?>
				<label>Product:</label>
				<input type="text" id="product-name" list="product-list" class="form-control" placeholder="Items" required>
                <datalist id="product-list">
                  <?php foreach ($products as $key => $value) : ?>
                    <option value="<?= ucwords($value->product_name); ?>" data-id="<?= $value->product_id; ?>"><?php echo ucwords($value->category_name); ?></option> 
                  <?php endforeach; ?>
                </datalist>

		    </div>
		</div>
		<div class="col-sm-4">
		    <div class="form-group">
		     	<label>Branch:</label>
		     	<p><?php echo strtoupper($this->session->userdata('branch')->branch_name);  ?></p>
		    	<!-- <input type="text" class="form-control input-sm disabled" name="branch" value="2"> -->
		    </div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
		      	<label>Quantity on Hand:</label>
		      	<input type="number" class="form-control input-sm" name="qty" required>
		    </div>
		</div>
		

		<div class="col-sm-12 text-right">
			<button type="button" class="btn btn-default btn-sm" id="btn-clear-stock">Clear</button>
			<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
		</div>

		<?= form_close();?>
     
    </div>

  </div>
  <!-- /.box-body -->
</div>