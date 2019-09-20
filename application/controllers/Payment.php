<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Payment extends MY_Controller
{
	
	public function index() {

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Patients']);
		$this->load->view('payment/payment');
		$this->load->view('_layouts/footer');

	}
}