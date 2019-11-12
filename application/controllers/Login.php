<?php
defined('BASEPATH') OR exit('No direct script access allowed');



Class Login extends CI_Controller {


	function __construct(){
		parent::__construct();
		// if( $this->session->userdata('logged_in') == true ) {
		// 	var_dump($this->session->userdata('logged_in'));
		// 	redirect('dashboard');
		// }else{
		// 	var_dump($this->session->userdata('logged_in'));
		// }
	}


	function index($error = 0) {

		// var_dump($this->session->userdata);

		$data['branches'] = $this->branch->get_all();
		$this->load->view('login', $data);

	}

	function user_login() {

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$branch_id = $this->input->post('branch_id');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('branch_id', 'branch_id', 'required');

		if( $this->form_validation->run() != FALSE ){
			$this->load->model('user');

			$user = (array)$this->user->get(['username' => $username]);

			if( isset($user['password']) && password_verify($password, $user['password']) ){
				
				$this->load->model('user_roles');
				unset($user['password']);
				$user['role'] = (array)$this->user_roles->get(['role_id' => $user['role_id']]);
				$user['branch_id'] = $branch_id;
				// 1. get user profile
				// add user session
				$this->session->set_userdata($user);
				// additional session data
				$this->session->set_userdata('logged_in', TRUE);

				echo 1;
				exit;
			}
		}
		echo 0;
		
		// $data = array(
		// 	'username' => $this->input->post('username'),
		// 	'password' => $this->input->post('password'),
		// 	'branch_id' => $this->input->post('branch_id')
		// );
	}

	function user_logout() {

		$userdata = $this->session->all_userdata();

		foreach ($userdata as $key => $value) {

			if( $key != 'session_id' && $key != 'ip_address' && $key != 'last_activity' ){
				$this->session->unset_userdata($key);
			}
			
		}

		$this->session->sess_destroy();
		redirect('login');
	}

}