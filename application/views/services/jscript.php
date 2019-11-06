<script>
						
	$(function(){

		services();
		packages();
		categories();
	});
	var packageData = [];
	var categoryData = [];

	function packages(){
		$.ajaxSetup({
		    async: false
		});	
		$.getJSON('<?=base_url('services/packages')?>', {}, function(json, textStatus) {
			process_package_data(json);
			var option = "<option selected disabled>Select Package</option>";
			$.each(json, function(index, val) {
				option += "<option value='"+val.service_package_id+"'>"+ val.package_name +"</option>";
			});
			$("#packages").html(option);
		});
	}
	
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

	function addPackage(){
		var packageName = $("#package-name").val();
		$.post('<?=base_url('services/add_package')?>', {package: packageName}, function(data, textStatus, xhr) {
			$.notify('Package ' + packageName + " has been added.", 'success');
			packages();
			hidePackage();
		});
	}

	function categories(){
		$.ajaxSetup({
		    async: false
		});	
		$.getJSON('<?=base_url('services/categories')?>', {}, function(json, textStatus) {
			var option = "<option selected disabled>Select Package</option>";
			process_category_data(json)
			$.each(json, function(index, val) {
				option += "<option value='"+val.category_id+"'>"+ val.category_name +"</option>";
			});
			$("#category").html(option);
		});
	}
		
	function addCategory(){
		var categoryName = $("#category-name").val();
		$.post('<?=base_url('services/add_category')?>', {category: categoryName}, function(data, textStatus, xhr) {
			$.notify('category ' + categoryName + " has been added.", 'success');
			categories();
			hideCategory();
		});
	}

	function submit_service_form(){
		alert()
	}

	function services(){
		$.getJSON('<?=base_url('services/services')?>', {}, function(json, textStatus) {
			console.log(json)
			var tr = "";
			$.each(json, function(index, val) {
				tr += "<tr>\
						<td><span class='package_name data-pk='"+val.services_id+"''>"+ val.package_name +"</span></td>\
						<td><span class='category_name data-pk='"+val.services_id+"' data-type='select' >"+ val.category_name +"</span></td>\
						<td><span class='service_name' data-pk='"+val.services_id+"'>"+ val.service_name +"</span></td>\
						<td><span class='service_price' data-pk='"+val.services_id+"'>"+val.price+"</span></td>\
					  </tr>";
			});
			$("#services_rows").html(tr);
			$("#services_tbl").dataTable();
			editables();
		});
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
	
	function editables(){
		$(".package_name").editable({
			type: 'select',
			source: packageData
		}).bind(packageData);

		$(".category_name").editable({
			mode: 'inline',
			url: '<?=base_url('services/update_category')?>',
		    'source': function() {
		        return categoryData;
		    },
			success: function(response, newValue) {
				console.log(response)
		    }
		}).bind(categoryData);

		$(".service_name").editable({
			mode: 'inline',
			url: '<?=base_url('services/update_service')?>',
			success: function(response, newValue) {
				if( response == 'true' ){
					$.notify('Update successful.', 'success');
				}
				if( response == 'false' ){
					return 'Something went wrong';
				}
				console.log(response)
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
				console.log(response)
		    }
		});
	}

</script>

<style>
		
	.hand-hover:hover {
		cursor:pointer;
	}

</style>