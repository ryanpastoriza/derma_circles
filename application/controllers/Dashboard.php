<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends MY_Controller {
	
	public function index() {
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Dashboard']);
		$this->load->view('dashboard/dashboard');
		$this->load->view('_layouts/footer');

	}
}