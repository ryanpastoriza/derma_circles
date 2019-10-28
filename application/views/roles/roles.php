
<div class="content-wrapper">
	<section class="content-header">
		<h1> Roles and Accessibility
			<!-- <small>Roles and Accessibility</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

	<section class="content">

		<div class="row">
			
			<div class="col-lg-3">


				<div class="box box-solid collapsed-box">
				  	<div class="box-header with-border">
				    	<h3 class="box-title"> Add Role </h3>
				    	<div class="pull-right box-tools">
			                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
			                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				    	</div>

				  	</div>
				  	<div class="box-body">
				  		<form action="<?= base_url('roles/add_role')?>" method="POST">
					  		<div class="input-group">
				                <input name="role_name" type="text" class="form-control" placeholder="New Role" required>
				                <div class="input-group-btn">
			                  		<button type="submit" class="btn btn-primary btn-flat" id="add_role">Add</button>
				                </div>
			              	</div>
				  		</form>
				  	</div>
				</div>

				<div class="box box-solid">
				  	<div class="box-header with-border">
				    	<h3 class="box-title"> Roles </h3>
				    	<div class="pull-right box-tools">
				      		<span class="label bg-blue"><?= count($roles); ?></span>
				    	</div>
				  	</div>

				  	<div class="box-body">
				  		<p>	
				  			<?php foreach ($roles as $key => $value): ?>			  				
						  		<button type="button" class="btn btn-md btn-roles" data-id='<?=$value->role_id?>'><?= ucfirst($value->role_name); ?></button>
				  			<?php endforeach ?>
				  		</p>
				  	</div>
				</div>
			</div>

			<div class="col-lg-9">
				<div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Horizontal Form</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal">
		              <div class="box-body">
		                <div class="form-group">
		                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

		                  <div class="col-sm-10">
		                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

		                  <div class="col-sm-10">
		                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="col-sm-offset-2 col-sm-10">
		                    <div class="checkbox">
		                      <label>
		                        <input type="checkbox"> Remember me
		                      </label>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <button type="submit" class="btn btn-default">Cancel</button>
		                <button type="submit" class="btn btn-primary pull-right">Sign in</button>
		              </div>
		              <!-- /.box-footer -->
		            </form>
		          </div>
			</div>

		</div>

	</section>

</div>
