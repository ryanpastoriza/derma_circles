
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Accounts
			<!-- <small>Register</small> -->
		</h1>
			<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

  	<section class="content">

  		<div class="row">
  			<div class='col-lg-3'>

  				<div class="box">
					<div class="box-body">
						<div class="table-responsive">
		  					<table class="table table-hover" id="accounts_tbl">
		  						<thead>
									<th>Username</th>
		  						</thead>
		  						<tbody>
		  							<?php foreach ($accounts as $key => $value): ?>
			  							<tr data-id="<?=$value->user_id?>" data-username="<?=$value->username?>" data-role-id="<?=$value->role_id?>">
			  								<td><?= $value->username ?></td>
			  							</tr>
		  							<?php endforeach ?>
		  						</tbody>
		  					</table>
		  				</div>
					</div>  					
  				</div>

  			</div>

  			<div class='col-lg-9'>
	  			<div class="box">
		      		<div class="box-header with-border">
		        		<h3 class="box-title">Form</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div>
		      		</div>

					<div class="box-body">
						<form method="POST" action="<?=base_url('accounts/register')?>">
							<input type="hidden" name="user_id" id="user_id" value="<?=set_value('user_id');?>">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputAddress">Username</label>
							    	<input type="text" class="form-control" name="username" id="username" required value="<?=set_value('username');?>">
							  	</div>
							  	<div class="form-group col-md-6">
									<label for="inputAddress">User Role</label>
							    	<select name="role_id" id="role_id" class="form-control">
							    		<?php foreach ($roles as $key => $value): ?>
											<?php $selected = set_value('role_id') == $value->role_id ? 'selected' : ''?>  			
								    		<option value="<?=$value->role_id?>" <?=$selected ?> ><?= ucfirst($value->role_name) ?></option>
							    		<?php endforeach ?>
							    	</select>
							  	</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputAddress">Password</label>
							    	<input type="password" class="form-control" name="password" id="password" required>
							  	</div>
							  	<div class="form-group col-md-6">
									<label for="inputAddress">Confirm Password</label>
							    	<input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
							  	</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php if (validation_errors()): ?>
										<div class="alert alert-danger">
											<?php echo validation_errors(); ?>
										</div>
									<?php endif ?>
									<?php if($this->session->flashdata('reg_msg')): ?>
										<div class="alert alert-success">
										    <p><?php echo $this->session->flashdata('reg_msg'); ?></p>
										</div>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6 text-right">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>

					<div class="box-footer"></div>
		  		</div>
  			</div>

  		</div>

  	</section>


</div>