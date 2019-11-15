<script>
						
	$(function(){
		services();
		packages();
		categories();
	});
	var packageData = [];
	var categoryData = [];
	
	function showPackageForm(){
		$(".add-package").removeClass('hidden')
	}
	
	function hidePackage(){	
		$(".add-package").addClass('hidden')
	}
	function showCategoryForm(){
		$(".add-category").removeClass('hidden')
	}
	
	function hideCategory(){	
		$(".add-category").addClass('hidden')
	}

	function packages(){
		$.ajaxSetup({
		    async: false
		});	
		$.getJSON('<?=base_url('services/packages')?>', {}, function(json, textStatus) {
			process_package_data(json);
			var option = "<option selected disabled>Select Package</option>";
			var tr = "";
			$.each(json, function(index, val) {
				option += "<option value='"+val.service_package_id+"'>"+ val.package_name +"</option>";
				tr += " <tr>\
							<td><span class='package_name_2' data-pk='"+val.service_package_id+"'>"+ val.package_name +"</span></td>\
						</tr>";
			});
			$("#packages").html(option);
			$("#packages_rows").html(tr)
			$("#packages_tbl").dataTable();
			$("#package_name_diff_tab").val('')
		});
	}

	function addPackage(){
		var packageName = $("#package-name").val() ? $("#package-name").val() : $("#package_name_diff_tab").val();
		$.post('<?=base_url('services/add_package')?>', {package: packageName}, function(data, textStatus, xhr) {
			$.notify('Package ' + packageName + " has been added.", 'success');
			packages();
			hidePackage();
			$("#package-name").val('')
			$("#package_name_diff_tab").val('')
		});
	}

	function categories(){
		$.ajaxSetup({
		    async: false
		});	
		$.getJSON('<?=base_url('services/categories')?>', {}, function(json, textStatus) {
			var option = "<option selected disabled>Select Category</option>";
			var tr = "";
			process_category_data(json)
			$.each(json, function(index, val) {
				option += "<option value='"+val.category_id+"'>"+ val.category_name +"</span></option>";
				tr += " <tr>\
							<td><span class='category_name_2' data-pk='"+val.category_id+"'>"+ val.category_name +"</span></td>\
						</tr>";
			});
			$("#category").html(option);
			$("#category_rows").html(tr);
			$("#category_name_diff_tab").val('')
			$("#category_tbl").dataTable();
		});
	}
		
	function addCategory(){
		var categoryName = $("#category-name").val() ? $("#category-name").val() : $("#category_name_diff_tab").val();
		$.post('<?=base_url('services/add_category')?>', {category: categoryName}, function(data, textStatus, xhr) {
			$.notify('category ' + categoryName + " has been added.", 'success');
			categories();
			hideCategory();
			$("#category-name").val('')
			$("#category_name_diff_tab").val('')

		});
	}

	function services(){
		$.getJSON('<?=base_url('services/services')?>', {}, function(json, textStatus) {
			var tr = "";
			$.each(json, function(index, val) {
				tr += "<tr>\
						<td><span class='service_name' data-pk='"+val.services_id+"'>"+ val.service_name +"</span></td>\
						<td><span class='package_name' data-pk='"+val.services_id+"' data-type='select'>"+ val.package_name +"</span></td>\
						<td><span class='category_name' data-pk='"+val.services_id+"' data-type='select'>"+ val.category_name +"</span></td>\
						<td><span class='service_price' data-pk='"+val.services_id+"'>"+val.price+"</span></td>\
					  </tr>";
			});
			$("#services_rows").html(tr);
			$("#services_tbl").dataTable();
			// editables();
		});
	}

	function add_service() {

		var is_complete = true;
		if(!$("#packages").val()){
			$.notify('Please select package.', 'error');
			is_complete = false;	
		}
		if(!$("#category").val()){
			$.notify('Please select category.', 'error');
			is_complete = false;		
		}
		if(!$("#service_name").val()){
			$.notify('Service name is required.', 'error');
			is_complete = false;		
		}
		if($("#price").val() <= 0){
			$.notify('Price is required.', 'error');
			is_complete = false;		
		}

		if(is_complete === true){
			$.post("<?=base_url('services/add_service')?>", {
				package_id: $("#packages").val(), 
				category_id: $("#category").val(), 
				service_name: $("#service_name").val(),
				price: $("#price").val()
			}, function(data, textStatus, xhr) {
				services();
			});
		}
	}

	function process_package_data(data){
		var a = [];
		$.each(data, function(index, val) {
			a.push({value: val.service_package_id, text: val.package_name});
		});
		packageData = a;
	}

	function process_category_data(data){
		var a = [];
		$.each(data, function(index, val) {
			a.push({value: val.category_id, text: val.category_name});
		});
		categoryData = a;
	}
	
	function services_edit_mode(form){
		editables(form);
		if(form == 'services'){
			$(".services_edit_mode").addClass('hidden');
			$(".disable_edit_services").removeClass('hidden');
		}
		if(form == 'packages'){
			$(".packages_edit_mode").addClass('hidden');
			$(".disable_edit_packages").removeClass('hidden');
		}
		if(form == 'category'){
			$(".category_edit_mode").addClass('hidden');
			$(".disable_edit_category").removeClass('hidden');
		}
	}

	function disable_edit_services(form){
		if(form == 'services'){
			$('.package_name').editable('destroy');
			$('.category_name').editable('destroy');
			$('.service_name').editable('destroy');
			$('.service_price').editable('destroy');
			$(".disable_edit_services").addClass('hidden');
			$(".services_edit_mode").removeClass('hidden');
		}
		if(form == 'packages'){
			$('.package_name_2').editable('destroy');
			$(".disable_edit_packages").addClass('hidden');
			$(".packages_edit_mode").removeClass('hidden');
		}

		if(form == 'category'){
			$('.category_name_2').editable('destroy');
			$(".category_edit_mode").removeClass('hidden');
			$(".disable_edit_category").addClass('hidden');
		}
	}

	function editables(form){
		if(form == 'services'){
			$(".package_name").editable({
				send: 'always',
				mode: 'inline',
				source: packageData,
				url: "<?=base_url('services/update_package')?>",
				success: function(response, newValue) {
					if( response == 'true' ){
						$.notify('Update successful.', 'success');
					}
					if( response == 'false' ){
						return 'Something went wrong';
					}
			    }
			}).bind(packageData);

			$(".category_name").editable({
				send: 'always',
				mode: 'inline',
				url: "<?=base_url('services/update_category')?>",
			    'source': function() {
			        return categoryData;
			    },
				success: function(response, newValue) {
					if( response == 'true' ){
						$.notify('Update successful.', 'success');
					}
					if( response == 'false' ){
						return 'Something went wrong';
					}
			    }
			}).bind(categoryData);

			$(".service_name").editable({
				mode: 'inline',
				url: "<?=base_url('services/update_service')?>",
				success: function(response, newValue) {
					if( response == 'true' ){
						$.notify('Update successful.', 'success');
					}
					if( response == 'false' ){
						return 'Something went wrong';
					}
			    }
			});

			$(".service_price").editable({
				mode: 'inline',
				type: 'number',
				step: 'any',
				url: '<?=base_url('services/update_price')?>',
				success: function(response, newValue) {
					if( response == 'true' ){
						$.notify('Update successful.', 'success');
					}
					if( response == 'false' ){
						return 'Something went wrong';
					}
			    }
			});
		}
		if(form == 'packages'){		
			$(".package_name_2").editable({
				mode: 'inline',
				url: '<?=base_url('services/update_package_2')?>',
				success: function(response, newValue) {
					if( response == 'true' ){
						$.notify('Update successful.', 'success');
					}
					if( response == 'false' ){
						return 'Something went wrong';
					}
			    }
			});
		}
		if(form == 'category'){
			$(".category_name_2").editable({
				mode: 'inline',
				url: '<?=base_url('services/update_category_2')?>',
				success: function(response, newValue) {
					if( response == 'true' ){
						$.notify('Update successful.', 'success');
					}
					if( response == 'false' ){
						return 'Something went wrong';
					}
			    }
			});
		}

	}

</script>

<style>
		
	.hand-hover:hover {
		cursor:pointer;
	}

</style>