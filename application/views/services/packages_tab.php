
<div class="row">
	<div class="col-lg-8">
		<form>
			<div class="box box-primary collapsed-box">
				<div class="box-header with-border">
			      	<h4 class="box-title"><span class="fa fa-plus"></span> Add Package</h4>	
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div>
			    </div>
	    		<div class="box-body" style="padding: 20px; display: none;">
	    			<div class="form-group">
						<label for="package">Package Name:</label>
						<input type="text" class="form-control" name="package_name" id="package_name_diff_tab">
					</div>
	    		</div>
			    <div class="box-footer">
			    	<button class="btn btn-primary btn-md pull-right" onclick="addPackage()" type="button">Submit</button>
			    </div>
			</div>
		</form>

		<div class="box box-solid">
			<div class="box-body">
				<table class="table table-hover" id="packages_tbl">
					<thead>
						<th>Package</th>
					</thead>
					<tbody id="packages_rows"></tbody>
				</table>
			</div>
		</div>
	</div>	

	<div class="col-lg-4">
	</div>

</div>
