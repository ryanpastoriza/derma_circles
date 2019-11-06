

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
					<?php $this->load->view('services/packages_tab'); ?>
				</div>
				<div id="category_tab" class="tab-pane fade">
					<?php $this->load->view('services/category_tab'); ?>
				</div>
			</div>
		</div>

	</section>

</div>