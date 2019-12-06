<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
  
    <div class="row">
      
      <div class="col-sm-4">
        <?php $this->load->view('inventory/products/create'); ?>
      </div>  

      <div class="col-sm-8">
      	<?php $this->load->view('inventory/products/list'); ?>
      </div>
      
    </div>
   
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
	
	$(function(){

		var oTable = $('#tbl-products').DataTable({
			ajax: { "url" : "<?php echo base_url(); ?>inventory/product_list" },
			"columnDefs": [ 
				{
	            "targets": -1,
	            "data": null,
	            "defaultContent": "<button class='btn btn-primary btn-sm product-edit'><i class='fa fa-pencil'></i></button> " + 
	            				  " <button class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>"
	       		},
	       		{
                "targets": [ 0, 2 ],
                "visible": false,
                "searchable": false
            	},
	        ]
		});

		 $('#tbl-products tbody').on( 'click', '.product-edit', function () {
	        var data = oTable.row( $(this).parents('tr') ).data();

	        $('input[name=product_id]').val(data[0]);
	        $('input[name=product_name]').val( data[1] );
	        $('textarea[name=decsription]').val( data[2] );
	        $('select[name=category]').val( data[2] );
	        $('input[name=price]').val( data[5] );

	        // alert( data[1] +"'s price is: "+ data[ 4 ] );
	    } );


		$(document).on('submit', '#frm-create-product', function(e){
			e.preventDefault();

			var form = $(this);
			var url = form.attr('action');
			var posting = $.post(url, form.serializeArray());
				posting.done(function(response) {
					console.log(response)
					if( response > 0 ){
						oTable.ajax.reload();
						form[0].reset();
						var update = $('input[name=product_id]').val();
						$('input[name=product_id]').val(0);

						if( update > 0 ){
							$.notify('Changes has been saved','success');
						}else{
							$.notify('New Product Added','success');
						}
						
					}else{
						$.notify('Something Went Wrong!','warn');
					}

				});

		});

		$(document).on('click', '#btn-clear-product', function(e){
			e.preventDefault();

			var form = $('#frm-create-product');
			$('input[name=product_id]').val(0);
			form[0].reset();

		});

		// get_products();
	});


	// function get_products() {


	// 	var url = '<?php //echo base_url('inventory/product_list'); ?>';
	// 	var posting = $.post(url);
	// 		posting.done(function(data){
	// 			console.log(data);
	// 		})


	// }

</script>