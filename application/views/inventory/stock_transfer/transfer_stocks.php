<div class="box box-solid">
  
  <div class="box-body">

    <div class="row">
      <?= form_open(base_url().'inventory/transfer_to', ['id' => 'frm-transfer-stocks']); ?>
      <div class="col-sm-3">
        
        <div class="form-group">
            <label>Product:</label>
            <input type="text" id="product-name" list="product-list" class="form-control" placeholder="Items" required>
            <datalist id="product-list">
              <?php foreach ($products as $key => $value) : ?>
                <option value="<?= ucwords($value->product_name); ?>" data-id="<?= $value->product_id; ?>"><?php echo ucwords($value->category_name); ?></option> 
              <?php endforeach; ?>
            </datalist>
        </div>
      </div>

      <div class="col-sm-3">
        
        <div class="form-group">
        <label>Branch (From):</label>
        <select class="form-control" name="transfer_from">
           <?php foreach ($branch as $key => $value) : ?>
                    <?php if ($value->branch_id != 1) { continue; } ?>
                    <option value="<?= ucwords($value->branch_id); ?>"><?php echo ucwords($value->branch_name); ?></option> 
            <?php endforeach; ?>
        </select>
        </div>
      </div>

      <div class="col-sm-3">
        
        <div class="form-group">
        <label>Branch (to):</label>
        <select class="form-control" name="transfer_to">
          <option value="">Select Branch</option>
           <?php foreach ($branch as $key => $value) : ?>
                    <?php if ($value->branch_id == 1) { continue; } ?>
                    <option value="<?= ucwords($value->branch_id); ?>"><?php echo ucwords($value->branch_name); ?></option> 
            <?php endforeach; ?>
        </select>
        </div>
      </div>

      <div class="col-sm-3">
        
        <div class="form-group">
        <label>Quantity:</label>
        <input type="number" name="quantity" class="form-control" />
        </div>
      </div>

      <div class="col-sm-12 text-right">
        <button type="button" class="btn btn-default btn-sm" id="btn-clear-stock">Clear</button>
        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
      </div>
      <?= form_close();?>

    </div>


  </div>
</div>
