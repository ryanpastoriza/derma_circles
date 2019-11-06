<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Services extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		$roles = $this->user_roles->get_all();
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Services']);
		$this->load->view('services/services', []);
		$this->load->view('services/jscript');
		$this->load->view('_layouts/footer');
	}

	public function packages(){
		$packages = $this->service_package->get_all();
		echo json_encode($packages);
	}	

	public function add_package(){
		$package_name = $this->input->post('package');
	    $this->service_package->insert(['package_name' => $package_name]);
	}

	public function categories(){
		$categories = $this->service_category->get_all();
		echo json_encode($categories);
	}

	public function add_category(){
		$category_name = $this->input->post('category');
	    $this->service_category->insert(['category_name' => $category_name]);
	}

	public function services(){
		$services = $this->services_model->get_services();
		echo json_encode($services);
	}

	public function add_service(){
		$rows = $this->input->post();
	    $ins = $this->services_model->insert($rows);
		echo json_encode($ins);
	}

	public function update_service(){
		$row['service_name'] = $_REQUEST['value'];
	    $this->db->where('services_id', $_REQUEST['pk'])->update('services', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }
	}

	public function update_price(){
		$row['price'] = $_REQUEST['value'];
	    $this->db->where('services_id', $_REQUEST['pk'])->update('services', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

	public function update_category(){
		$row['category_id'] = $_REQUEST['value'];
	    $this->db->where('services_id', $_REQUEST['pk'])->update('services', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

	public function update_package()
	{
		$row['package_id'] = $_REQUEST['value'];
	    $this->db->where('services_id', $_REQUEST['pk'])->update('services', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

	public function update_package_2(){
		$row['package_name'] = $_REQUEST['value'];
		$this->db->where('service_package_id', $_REQUEST['pk'])->update('service_package', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

	public function update_category_2(){
		$row['category_name'] = $_REQUEST['value'];
		$this->db->where('category_id', $_REQUEST['pk'])->update('service_category', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

}

?>