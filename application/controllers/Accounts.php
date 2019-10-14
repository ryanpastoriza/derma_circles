<?php

/**
 * 
 */
class Accounts extends MY_Controller
{
		
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('user_roles');
		$this->load->model('user');
	}

	public function index()
	{
		$roles = $this->user_roles->get_all();
		$accounts = $this->user->get_all();
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Accounts']);
		$this->load->view('accounts/accounts', ['roles' => $roles, 'accounts' => $accounts]);
		$this->load->view('accounts/jscript');
		$this->load->view('_layouts/footer');
	}

	public function register()
	{
		$post = (object) $this->input->post();

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
		
		if(!$post->user_id){
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		}

		if ($this->form_validation->run() == FALSE)
        {
        	$this->index();
        }
        else
        {
        	$row['username'] = $post->username;
        	$row['password'] = password_hash($post->password, PASSWORD_DEFAULT);
        	$row['status']   = 'active';
        	$row['role_id']  = $post->role_id;
        	echo $post->user_id;
        	if(!$post->user_id){
	        	$insert = $this->user->insert($row);
			    $this->session->set_flashdata('reg_msg', 'Registration successful.');
        	}
        	else{
			    $this->db->where('user_id', $post->user_id)->update('user', $row);
			    $this->session->set_flashdata('reg_msg', 'Update successful.');
        	}
		    redirect(base_url('accounts'));
        }
	}
}

?>