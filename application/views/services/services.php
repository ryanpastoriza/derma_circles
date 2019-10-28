

<div class="content-wrapper">
	<section class="content-header">
		<h1> <span class="fa fa-handshake-o"></span> Services
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
        

	    </div>



		<div class="col-lg-2">
			<div class="box box-solid">
	            <div class="box-body">
	              	<ul class="nav nav-stacked">
		                <li role="presentation" class="active"><a data-toggle="tab" href="#services_tab">Services</a></li>
		                <li role="presentation"><a data-toggle="tab" href="#packages_tab">Packages</a></li>
		                <li role="presentation"><a data-toggle="tab" href="#category_tab">Category</a></li>
	              	</ul>
	            </div>
          	</div>

		</div>
		<div class="col-lg-10">
			
			<div class="tab-content">
				<div id="services_tab" class="tab-pane fade in active">
					<?php $this->load->view('services/services_tab'); ?>
				</div>
				<div id="packages_tab" class="tab-pane fade">
					<h3>Menu 1</h3>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div id="category_tab" class="tab-pane fade">
					<h3>Menu 2</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
			</div>
		</div>

	</section>

</div>