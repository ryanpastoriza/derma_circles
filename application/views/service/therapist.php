<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
  	
  	<div class="row">
  		
  		<div class="col-sm-4">
  			
  			<div class="box box-solid">
	            <div class="box-header with-border">
	              <i class="fa fa-hand-stop-o"></i>

	              <h3 class="box-title">Therapist</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">

	            	<div class="row">
	            		
	            		<div class="col-sm-12">
		            		<div class="input-group">
				                <input type="text" class="form-control">
				                    <span class="input-group-btn">
				                      <button type="button" class="btn btn-info btn-flat">Add</button>
				                    </span>
				            </div>
			            </div>

			            <div class="col-sm-12 spacer-sm">
			            	
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Therapist</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($therapist as $key => $value) : ?>
										<tr>
											<td><?= ucwords($value->name); ?></td>
										</tr>
									<?php endforeach; ?>
									
								</tbody>
							</table>

			            </div>

	            	</div>	
	            </div>
          	</div>	

  		</div>


  		<div class="col-sm-8">
  			
  			<div class="box box-solid">
	            <div class="box-header with-border">
	              <i class="fa fa-hand-stop-o"></i>

	              <h3 class="box-title">General Information</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            	
	            	<div class="row">
	            		

	            	</div>	
	            </div>
          	</div>	


  		</div>
		

  	</div>
  
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->