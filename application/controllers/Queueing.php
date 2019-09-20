<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Queueing extends MY_Controller
{
	
	public function index() {

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Queueing']);
		$this->load->view('queueing/queueing');
		$this->load->view('_layouts/footer');

	}
}