
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
				    	</div>

				  	</div>
				  	<div class="box-body" style="display:none;">
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
		            	<h3 class="box-title">Accessibility</h3>
		            </div>
	              	<div class="box-body">
	               		asad
	              	</div>
	              	<div class="box-footer">
		                <button type="submit" class="btn btn-primary pull-right">Sign in</button>
		            </div>
		          </div>
			</div>

		</div>

	</section>

</div>
