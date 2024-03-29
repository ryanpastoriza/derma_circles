


<form id="service_form">
	<div class="box box-primary collapsed-box">
		<div class="box-header with-border">
	      	<h3 class="box-title"><span class="fa fa-plus"></span> Add Service</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
			</div>
	    </div>
	    <div class="box-body" style="padding: 20px; display: none;">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="packages">Package:</label>
						<div class="input-group">
							<select name="package_id" id="packages" class="form-control"></select>
			                <span class="input-group-addon hand-hover" onclick="showPackageForm()" title="Add Package"><i class="fa fa-plus"></i></span>
		              	</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="category">Category:</label>
						<div class="input-group">
							<select name="category_id" id="category" class="form-control"></select>
			                <span class="input-group-addon hand-hover" onclick="showCategoryForm()" title="Add Category"><i class="fa fa-plus"></i></span>
		              	</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="box box-solid add-package hidden">
						<div class="box-body">
							<div class="form-group">
								<label for="email">Add Package:</label>
								<div class="input-group">
									<input type="text" class="form-control" id="package-name">
					                <span class="input-group-addon hand-hover" onclick="hidePackage()"><i class="fa fa-minus"></i></span>
					                <span class="input-group-addon hand-hover" onclick="addPackage()"><i class="fa fa-check text-primary"></i></span>
				              	</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="box box-solid add-category hidden">
						<div class="box-body">
							<div class="form-group">
								<label for="email">Add Category:</label>
								<div class="input-group">
									<input type="text" class="form-control" id="category-name">
					                <span class="input-group-addon hand-hover" onclick="hideCategory()"><i class="fa fa-minus"></i></span>
					                <span class="input-group-addon hand-hover" onclick="addCategory()"><i class="fa fa-check text-primary"></i></span>
				              	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="service">Service Name:</label>
						<input type="text" class="form-control" name="service_name" id="service_name">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="number" class="form-control" step=".01" value="0.00" name="price" id="price">
					</div>
				</div>
			</div>
	    </div>
	    <div class="box-footer">
	    	<button class="btn btn-primary btn-md pull-right" onclick="add_service()" type="button">Submit</button>
	    </div>
	</div>
</form>

<div class="box box-solid">
	<div class="box-body">
		<div class="row" style="text-align: right; padding:0px 20px 10px 0px;">
			<button class="btn btn-link services_edit_mode" onclick="services_edit_mode('services')"><span class="fa fa-edit"></span> Edit Mode</button>
			<button class="btn btn-link disable_edit_services hidden" onclick="disable_edit_services('services')"><span class="fa fa-check"></span> Edit Done</button>
		</div>
		<table class="table table-hover" id="services_tbl">
			<thead>
				<th>Service</th>
				<th>Package</th>
				<th>Category</th>
				<th>Price</th>
			</thead>
			<tbody id="services_rows"></tbody>
		</table>
	</div>
</div>