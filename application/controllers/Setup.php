<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Setup extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('user_roles');
	}

	public function index() {
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Setup']);
		$this->load->view('setup/setup');
		$this->load->view('_layouts/footer');
	}

	public function roles()
	{
		$roles = $this->user_roles->get_all();
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Roles and Accessibility']);
		$this->load->view('setup/roles', ['roles' => $roles]);
		$this->load->view('setup/jscript');
		$this->load->view('_layouts/footer');
	}

	public function add_role()
	{
		$role = $this->input->post('role_name');
		$this->form_validation->set_rules('role_name', 'role_name', 'is_unique[user_roles.role_name]');
        
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('error', 'Role already exists.');
		}
		else{
			$this->user_roles->insert(['role_name' => $role]);
		    $this->session->set_flashdata('reg_msg', 'Registration successful.');		
		}
	    redirect(base_url('setup/roles'));	
	}

}