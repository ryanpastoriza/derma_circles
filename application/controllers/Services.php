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

}

?>