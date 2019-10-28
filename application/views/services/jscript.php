<script>
	
	$(function(){

		packages();
		categories();
	});

	function packages(){							
		$.getJSON('<?=base_url('services/packages')?>', {}, function(json, textStatus) {
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
		$.getJSON('<?=base_url('services/categories')?>', {}, function(json, textStatus) {
			var option = "<option selected disabled>Select Package</option>";
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

</script>

<style>
		
	.hand-hover:hover {
		cursor:pointer;
	}

</style>