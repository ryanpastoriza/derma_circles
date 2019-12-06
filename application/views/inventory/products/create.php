<div class="box box-solid">

  <div class="box-header with-border">
    <h3 class="box-title"> <i class="fa fa-plus"></i> Add Product</h3>
  </div>

  <div class="box-body">
    
    <div class="row">
      	
      	<?= form_open(base_url().'inventory/create', ['id' => 'frm-create-product']); ?>
      	<input type="hidden" name="product_id" value="0">
      	<div class="col-sm-12">
	    	<div class="form-group">
		      	<label>Product Name* :</label>
		      	<input type="text" class="form-control input-sm" name="product_name" required>
		    </div>

		    <div class="form-group">
		     	<label>Description:</label>
		    	<textarea style="resize: none;" class="form-control input-sm" name="description"></textarea>
		    </div>

		    <div class="form-group">
		      	<label>Category* :</label>
		      	<select class="form-control input-sm" name="category" required>
		      			<option value=""></option>
		      		<?php foreach ($category as $key => $value) : ?>
		      			<option value="<?= $value->category_id; ?>"><?= ucwords($value->category_name); ?></option>
		      		<?php endforeach; ?>
		      	</select>
		    </div>
	
			<div class="form-group">
		      	<label>Price* :</label>
		      	<input type="text" class="form-control input-sm" name="price" required>
		    </div>
		</div>

		<div class="col-sm-12 text-right">
			<button type="button" class="btn btn-default btn-sm" id="btn-clear-product">Clear</button>
			<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
		</div>

		<?= form_close();?>

    </div>

  </div>
  <!-- /.box-body -->
</div>