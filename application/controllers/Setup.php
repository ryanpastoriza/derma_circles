<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Setup extends MY_Controller
{
	
	public function index() {

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Setup']);
		$this->load->view('setup/setup');
		$this->load->view('_layouts/footer');

	}
}