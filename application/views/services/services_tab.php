
<div class="box box-primary">
	<div class="box-header with-border">
      <h3 class="box-title"><span class="fa fa-plus"></span> Add Service</h3>
    </div>
    <div class="box-body" style="padding: 20px;">
		<form action="#" method="POST" id="service_form">
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

		</form>
    </div>
</div>