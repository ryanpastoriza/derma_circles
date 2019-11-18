

<div class="content-wrapper">
	<section class="content-header">
		<h1> <span class="fa fa-building-o"></span> Branches
			<!-- <small>Roles and Accessibility</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

	<section class="content">
		
		<div class="container-fluid" >
			<div class="row">
				<div class="col-lg-8">
					<form id="branch_form">
						<div class="box box-primary collapsed-box">
							<div class="box-header with-border">
						      	<h4 class="box-title"><span class="fa fa-plus"></span> Add Branch</h4>	
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								</div>
						    </div>
				    		<div class="box-body" style="padding: 20px; display: none;">
								<div class="form-row">
					    			<div class="form-group col-md-6">
										<label for="package">Branch Name:</label>
										<input type="text" class="form-control" name="branch_name" id="branch_name">
									</div>
								</div>
								<div class="form-row">
					    			<div class="form-group col-md-6">
										<label for="address">Address:</label>
										<input type="text" class="form-control" name="location" id="location">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<div class="alert alert-danger branch_errors hidden" role="alert">
											
										</div>
									</div>
								</div>
				    		</div>
						    <div class="box-footer">
						    	<button class="btn btn-primary btn-md pull-right" type="button" onclick="addBranch()">Submit</button>
						    </div>
						</div>
					</form>

					<div class="box box-solid">
			            <div class="box-body">
							<div class="row" style="padding: 0px 10px 10px 0px; ">
								<button class="btn btn-link pull-right edit_mode" onclick="editMode()"><span class="fa fa-edit"></span> Edit Mode</button>
								<button class="btn btn-link pull-right done_edit hidden" onclick="doneEdit()"><span class="fa fa-check"></span> Edit Done</button>
							</div>
							<table class="table table-hover" id="branch_tbl" >
								<thead>
									<th>Branch</th>
									<th>Address</th>
								</thead>
								<tbody id="branch_tbody"></tbody>
							</table>
			            </div>
		          	</div>

				</div>
			</div>
		</div>

	</section>

</div>